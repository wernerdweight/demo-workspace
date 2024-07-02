<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240604180242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'FormEntityTable';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE album_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE album (id INT NOT NULL, title VARCHAR(255) NOT NULL, release_year INT NOT NULL, genres JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE track ADD album_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A61137ABCF FOREIGN KEY (album_id) REFERENCES album (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D6E3F8A61137ABCF ON track (album_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT FK_D6E3F8A61137ABCF');
        $this->addSql('DROP SEQUENCE album_id_seq CASCADE');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP INDEX IDX_D6E3F8A61137ABCF');
        $this->addSql('ALTER TABLE track DROP album_id');
    }
}
