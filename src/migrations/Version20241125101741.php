<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125101741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT FK_C1AB5A92980210EB');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT FK_C1AB5A9228DE1FED');
        $this->addSql('ALTER TABLE choice ALTER from_location_id SET NOT NULL');
        $this->addSql('ALTER TABLE choice ALTER to_location_id SET NOT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92980210EB FOREIGN KEY (from_location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A9228DE1FED FOREIGN KEY (to_location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB727ACA70 FOREIGN KEY (parent_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5E9E89CB727ACA70 ON location (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB727ACA70');
        $this->addSql('DROP INDEX IDX_5E9E89CB727ACA70');
        $this->addSql('ALTER TABLE location DROP parent_id');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT fk_c1ab5a92980210eb');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT fk_c1ab5a9228de1fed');
        $this->addSql('ALTER TABLE choice ALTER from_location_id DROP NOT NULL');
        $this->addSql('ALTER TABLE choice ALTER to_location_id DROP NOT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT fk_c1ab5a92980210eb FOREIGN KEY (from_location_id) REFERENCES location (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT fk_c1ab5a9228de1fed FOREIGN KEY (to_location_id) REFERENCES location (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
