<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241117222011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change position column type to string';
    }

    public function up(Schema $schema): void
    {
        // This migration changes the column type of position to string
        $this->addSql('ALTER TABLE location ALTER COLUMN position TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // This migration reverts the column type of position to array
        $this->addSql('ALTER TABLE location ALTER COLUMN position TYPE TEXT');
    }
}
