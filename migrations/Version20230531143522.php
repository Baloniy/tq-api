<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230531143522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE equipment_sets_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipment_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mastery_classes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE equipment_sets (id INT NOT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, items TEXT NOT NULL, properties JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN equipment_sets.items IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE equipment_types (id INT NOT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE equipments (id INT NOT NULL, type_id INT NOT NULL, set_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, item_level SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, properties JSON NOT NULL, level_requirement SMALLINT DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, drops_in VARCHAR(255) DEFAULT NULL, dexterity_requirement SMALLINT DEFAULT NULL, intelligence_requirement SMALLINT DEFAULT NULL, strength_requirement SMALLINT DEFAULT NULL, act VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, bonus JSON NOT NULL, summons JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6F6C2544389B783 ON equipments (tag)');
        $this->addSql('CREATE INDEX IDX_6F6C2544C54C8C93 ON equipments (type_id)');
        $this->addSql('CREATE INDEX IDX_6F6C254410FB0D18 ON equipments (set_id)');
        $this->addSql('COMMENT ON COLUMN equipments.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE mastery_classes (id INT NOT NULL, mastery_id INT DEFAULT NULL, additional_mastery_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C4FBAA16E26FCE68 ON mastery_classes (mastery_id)');
        $this->addSql('CREATE INDEX IDX_C4FBAA16F7DAE987 ON mastery_classes (additional_mastery_id)');
        $this->addSql('ALTER TABLE equipments ADD CONSTRAINT FK_6F6C2544C54C8C93 FOREIGN KEY (type_id) REFERENCES equipment_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE equipments ADD CONSTRAINT FK_6F6C254410FB0D18 FOREIGN KEY (set_id) REFERENCES equipment_sets (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mastery_classes ADD CONSTRAINT FK_C4FBAA16E26FCE68 FOREIGN KEY (mastery_id) REFERENCES mastery (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mastery_classes ADD CONSTRAINT FK_C4FBAA16F7DAE987 FOREIGN KEY (additional_mastery_id) REFERENCES mastery (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE equipment_sets_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipment_types_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mastery_classes_id_seq CASCADE');
        $this->addSql('ALTER TABLE equipments DROP CONSTRAINT FK_6F6C2544C54C8C93');
        $this->addSql('ALTER TABLE equipments DROP CONSTRAINT FK_6F6C254410FB0D18');
        $this->addSql('ALTER TABLE mastery_classes DROP CONSTRAINT FK_C4FBAA16E26FCE68');
        $this->addSql('ALTER TABLE mastery_classes DROP CONSTRAINT FK_C4FBAA16F7DAE987');
        $this->addSql('DROP TABLE equipment_sets');
        $this->addSql('DROP TABLE equipment_types');
        $this->addSql('DROP TABLE equipments');
        $this->addSql('DROP TABLE mastery_classes');
    }
}
