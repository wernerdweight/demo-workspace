<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Task>
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function findWithPagination(int $page, int $limit, ?string $searchTerm = null): array
  {
    $queryBuilder = $this->createQueryBuilder('task')
      ->orderBy('task.creationDate', 'DESC')
      ->setFirstResult(($page - 1) * $limit)
      ->setMaxResults($limit);
    if (null !== $searchTerm) {
      $queryBuilder
        ->andWhere('(lower(task.name) LIKE lower(:searchTerm) OR lower(task.description) LIKE lower(:searchTerm))')
        ->setParameter('searchTerm', '%' . $searchTerm . '%');
    }
    return $queryBuilder
      ->getQuery()
      ->getResult();
  }
  public function countWithSearchTerm(?string $searchTerm = null): int
  {
    $queryBuilder = $this->createQueryBuilder('task')
      ->select('count(task.id)');
    if (null !== $searchTerm) {
      $queryBuilder
        ->andWhere('lower(task.name) LIKE lower(:searchTerm)')
        ->setParameter('searchTerm', '%' . $searchTerm . '%');
    }
    return $queryBuilder
      ->getQuery()
      ->getSingleScalarResult();
  }

    //    /**
    //     * @return Task[] Returns an array of Task objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Task
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
