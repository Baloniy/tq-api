<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230523163755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE skills_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE skills (id INT NOT NULL, mastery_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, tier INT NOT NULL, "column" INT NOT NULL, maximum_level INT NOT NULL, type VARCHAR(255) NOT NULL, parent VARCHAR(255) DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, cool_down SMALLINT DEFAULT NULL, description TEXT DEFAULT NULL, properties JSON DEFAULT NULL, summons JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D5311670E26FCE68 ON skills (mastery_id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670E26FCE68 FOREIGN KEY (mastery_id) REFERENCES mastery (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('COMMENT ON COLUMN skills.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE skills_id_seq CASCADE');
        $this->addSql('ALTER TABLE skills DROP CONSTRAINT FK_D5311670E26FCE68');
        $this->addSql('DROP TABLE skills');
    }
}
