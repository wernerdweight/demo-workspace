<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203185404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artefact (id SERIAL NOT NULL, location_id INT NOT NULL, name VARCHAR(255) NOT NULL, image_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D158D2D64D218E ON artefact (location_id)');
        $this->addSql('CREATE TABLE user_artefact (user_id INT NOT NULL, artefact_id INT NOT NULL, PRIMARY KEY(user_id, artefact_id))');
        $this->addSql('CREATE INDEX IDX_6D98692DA76ED395 ON user_artefact (user_id)');
        $this->addSql('CREATE INDEX IDX_6D98692DB52412E3 ON user_artefact (artefact_id)');
        $this->addSql('ALTER TABLE artefact ADD CONSTRAINT FK_8D158D2D64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_artefact ADD CONSTRAINT FK_6D98692DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_artefact ADD CONSTRAINT FK_6D98692DB52412E3 FOREIGN KEY (artefact_id) REFERENCES artefact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE choice ADD required_artefact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92F5677E73 FOREIGN KEY (required_artefact_id) REFERENCES artefact (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C1AB5A92F5677E73 ON choice (required_artefact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE choice DROP CONSTRAINT FK_C1AB5A92F5677E73');
        $this->addSql('ALTER TABLE artefact DROP CONSTRAINT FK_8D158D2D64D218E');
        $this->addSql('ALTER TABLE user_artefact DROP CONSTRAINT FK_6D98692DA76ED395');
        $this->addSql('ALTER TABLE user_artefact DROP CONSTRAINT FK_6D98692DB52412E3');
        $this->addSql('DROP TABLE artefact');
        $this->addSql('DROP TABLE user_artefact');
        $this->addSql('DROP INDEX IDX_C1AB5A92F5677E73');
        $this->addSql('ALTER TABLE choice DROP required_artefact_id');
    }
}
