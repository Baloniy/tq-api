<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230607180934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Characters table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE characters_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE characters (id INT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) NOT NULL, health SMALLINT NOT NULL, mana SMALLINT NOT NULL, dexterity SMALLINT NOT NULL, intelligence SMALLINT NOT NULL, strength SMALLINT NOT NULL, defence SMALLINT NOT NULL, average_damage SMALLINT NOT NULL, attack_speed SMALLINT NOT NULL, damage_per_second SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3A29410EEA000B10 ON characters (class_id)');
        $this->addSql('COMMENT ON COLUMN characters.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410EEA000B10 FOREIGN KEY (class_id) REFERENCES mastery_classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE characters_id_seq CASCADE');
        $this->addSql('ALTER TABLE characters DROP CONSTRAINT FK_3A29410EEA000B10');
        $this->addSql('DROP TABLE characters');
    }
}
