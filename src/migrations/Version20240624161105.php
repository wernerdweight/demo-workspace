<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624161105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE portfolio_items_id_seq CASCADE');
        $this->addSql('DROP TABLE portfolio_items');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE portfolio_items_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE portfolio_items (id INT NOT NULL, packing_box TEXT DEFAULT NULL, banners TEXT DEFAULT NULL, clothing TEXT DEFAULT NULL, billboards TEXT DEFAULT NULL, business_cards TEXT DEFAULT NULL, logos TEXT DEFAULT NULL, prints TEXT DEFAULT NULL, patterns TEXT DEFAULT NULL, photos TEXT DEFAULT NULL, catalogues TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN portfolio_items.packing_box IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.banners IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.clothing IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.billboards IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.business_cards IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.logos IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.prints IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.patterns IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.photos IS \'(DC2Type:object)\'');
        $this->addSql('COMMENT ON COLUMN portfolio_items.catalogues IS \'(DC2Type:object)\'');
    }
}
