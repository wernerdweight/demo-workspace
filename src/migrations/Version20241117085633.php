<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241117085633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location ALTER "position" TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE location ALTER COLUMN options TYPE JSON USING options::json');
        $this->addSql('COMMENT ON COLUMN location.position IS NULL');
        $this->addSql('COMMENT ON COLUMN location.options IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE location ALTER position TYPE TEXT');
        $this->addSql('ALTER TABLE location ALTER COLUMN options TYPE TEXT');
        $this->addSql('COMMENT ON COLUMN location."position" IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN location.options IS \'(DC2Type:array)\'');
    }
}
