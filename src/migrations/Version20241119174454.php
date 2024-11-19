<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119174454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredience_receptu (id SERIAL NOT NULL, recept_id INT NOT NULL, ingredience_id INT NOT NULL, mnozstvi VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2B26BA06C6BF5295 ON ingredience_receptu (recept_id)');
        $this->addSql('CREATE INDEX IDX_2B26BA06A45E0E1F ON ingredience_receptu (ingredience_id)');
        $this->addSql('ALTER TABLE ingredience_receptu ADD CONSTRAINT FK_2B26BA06C6BF5295 FOREIGN KEY (recept_id) REFERENCES recepty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ingredience_receptu ADD CONSTRAINT FK_2B26BA06A45E0E1F FOREIGN KEY (ingredience_id) REFERENCES ingredience (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ingredience ADD nazev VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recepty ADD nazev VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recepty ADD postup TEXT NOT NULL');
        $this->addSql('ALTER TABLE recepty ADD imagepath VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ALTER is_verified SET DEFAULT false');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ingredience_receptu DROP CONSTRAINT FK_2B26BA06C6BF5295');
        $this->addSql('ALTER TABLE ingredience_receptu DROP CONSTRAINT FK_2B26BA06A45E0E1F');
        $this->addSql('DROP TABLE ingredience_receptu');
        $this->addSql('ALTER TABLE recepty DROP nazev');
        $this->addSql('ALTER TABLE recepty DROP postup');
        $this->addSql('ALTER TABLE recepty DROP imagepath');
        $this->addSql('ALTER TABLE ingredience DROP nazev');
        $this->addSql('ALTER TABLE "user" ALTER is_verified DROP DEFAULT');
    }
}
