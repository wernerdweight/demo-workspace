<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119191217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task ADD scope VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE task ADD listing VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE task DROP current_week');
        $this->addSql('ALTER TABLE task DROP next_week');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE task ADD current_week BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE task ADD next_week BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE task DROP scope');
        $this->addSql('ALTER TABLE task DROP listing');
    }
}
