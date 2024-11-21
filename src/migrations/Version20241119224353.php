<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119224353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice ADD from_location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice ADD to_location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice DROP from_position');
        $this->addSql('ALTER TABLE choice DROP to_position');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92980210EB FOREIGN KEY (from_location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A9228DE1FED FOREIGN KEY (to_location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_C1AB5A92980210EB ON choice (from_location_id)');
        $this->addSql('CREATE INDEX IDX_C1AB5A9228DE1FED ON choice (to_location_id)');
        $this->addSql('ALTER TABLE location ALTER location_text TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE location ALTER is_ending DROP DEFAULT');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E9E89CB462CE4F5 ON location (position)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_5E9E89CB462CE4F5');
        $this->addSql('ALTER TABLE location ALTER location_text TYPE TEXT');
        $this->addSql('ALTER TABLE location ALTER is_ending SET DEFAULT false');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT FK_C1AB5A92980210EB');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT FK_C1AB5A9228DE1FED');
        $this->addSql('DROP INDEX IDX_C1AB5A92980210EB');
        $this->addSql('DROP INDEX IDX_C1AB5A9228DE1FED');
        $this->addSql('ALTER TABLE choice ADD from_position VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE choice ADD to_position VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE choice DROP from_location_id');
        $this->addSql('ALTER TABLE choice DROP to_location_id');
    }
}
