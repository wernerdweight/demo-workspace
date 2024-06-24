<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624115556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE portfolio_card_item_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE portfolio_item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE portfolio_item (id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, first_imge JSON DEFAULT NULL, text TEXT DEFAULT NULL, second_image JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE portfolio_card_item');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE portfolio_item_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE portfolio_card_item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE portfolio_card_item (id INT NOT NULL, first_image JSON DEFAULT NULL, text TEXT DEFAULT NULL, second_image JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE portfolio_item');
    }
}
