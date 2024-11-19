<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119184842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredience DROP CONSTRAINT fk_ba37208843935287');
        $this->addSql('DROP INDEX idx_ba37208843935287');
        $this->addSql('ALTER TABLE ingredience RENAME COLUMN cena_id TO cena');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ingredience RENAME COLUMN cena TO cena_id');
        $this->addSql('ALTER TABLE ingredience ADD CONSTRAINT fk_ba37208843935287 FOREIGN KEY (cena_id) REFERENCES recepty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_ba37208843935287 ON ingredience (cena_id)');
    }
}
