<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Team>
 */
class TeamRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Team::class);
  }

  public function findWithPagination(int $page, int $limit, ?string $searchTerm = null): array
  {
    $queryBuilder = $this->createQueryBuilder('t')
      ->orderBy('t.name', 'ASC')
      ->setFirstResult(($page - 1) * $limit)
      ->setMaxResults($limit);
    if (null !== $searchTerm) {
      $queryBuilder
        ->andWhere('lower(t.name) LIKE lower(:searchTerm)')
        ->setParameter('searchTerm', '%' . $searchTerm . '%');
    }
    return $queryBuilder
      ->getQuery()
      ->getResult();
  }

  public function countWithSearchTerm(?string $searchTerm = null): int
  {
    $queryBuilder = $this->createQueryBuilder('t')
      ->select('count(t.id)');
    if (null !== $searchTerm) {
      $queryBuilder
        ->andWhere('lower(t.name) LIKE lower(:searchTerm)')
        ->setParameter('searchTerm', '%' . $searchTerm . '%');
    }
    return $queryBuilder
      ->getQuery()
      ->getSingleScalarResult();
  }

  //    /**
  //     * @return Team[] Returns an array of Team objects
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

  //    public function findOneBySomeField($value): ?Team
  //    {
  //        return $this->createQueryBuilder('t')
  //            ->andWhere('t.exampleField = :val')
  //            ->setParameter('val', $value)
  //            ->getQuery()
  //            ->getOneOrNullResult()
  //        ;
  //    }
}
