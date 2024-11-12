<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112191536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Použij dvojité uvozovky kolem názvu tabulky
        $this->addSql('ALTER TABLE "user" ADD is_verified BOOLEAN DEFAULT FALSE');

        // Nastav výchozí hodnotu `false` pro všechny existující záznamy
        $this->addSql('UPDATE "user" SET is_verified = FALSE');

        // Nastav `NOT NULL` omezení
        $this->addSql('ALTER TABLE "user" ALTER COLUMN is_verified SET NOT NULL');
    }



    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP is_verified');
    }
}
