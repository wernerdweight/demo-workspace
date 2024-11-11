<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241111183917 extends AbstractMigration
{
  public function getDescription(): string
  {
    return 'Add User entity';
  }

  public function up(Schema $schema): void
  {
    // this up() migration is auto-generated, please modify it to your needs
    $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, favourite_team_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    $this->addSql('CREATE INDEX IDX_8D93D649E19B47DE ON "user" (favourite_team_id)');
    $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
    $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649E19B47DE FOREIGN KEY (favourite_team_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
  }

  public function down(Schema $schema): void
  {
    // this down() migration is auto-generated, please modify it to your needs
    $this->addSql('CREATE SCHEMA public');
    $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649E19B47DE');
    $this->addSql('DROP TABLE "user"');
  }
}
