<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230522175854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE mastery_progressions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mastery_progressions (id INT NOT NULL, mastery_id INT NOT NULL, level SMALLINT NOT NULL, health SMALLINT NOT NULL, energy SMALLINT DEFAULT NULL, strength SMALLINT DEFAULT NULL, intelligence SMALLINT DEFAULT NULL, dexterity SMALLINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_30BFD990E26FCE68 ON mastery_progressions (mastery_id)');
        $this->addSql('ALTER TABLE mastery_progressions ADD CONSTRAINT FK_30BFD990E26FCE68 FOREIGN KEY (mastery_id) REFERENCES mastery (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE mastery_progressions_id_seq CASCADE');
        $this->addSql('ALTER TABLE mastery_progressions DROP CONSTRAINT FK_30BFD990E26FCE68');
        $this->addSql('DROP TABLE mastery_progressions');
    }
}
