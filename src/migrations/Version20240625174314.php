<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625174314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'FormEntity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE track_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE album_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE blog_entity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE blog_entity (id INT NOT NULL, title VARCHAR(255) NOT NULL, text TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT fk_d6e3f8a61137abcf');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE album');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE blog_entity_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE track_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE album_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE track (id INT NOT NULL, album_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, duration INT NOT NULL, isrc VARCHAR(255) DEFAULT NULL, sellable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_d6e3f8a61137abcf ON track (album_id)');
        $this->addSql('CREATE TABLE album (id INT NOT NULL, title VARCHAR(255) NOT NULL, release_year INT NOT NULL, genres JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT fk_d6e3f8a61137abcf FOREIGN KEY (album_id) REFERENCES album (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE blog_entity');
    }
}
