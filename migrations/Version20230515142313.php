<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230515142313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create mastery table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE mastery_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mastery (id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(100) NOT NULL, tag VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN mastery.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE mastery_id_seq CASCADE');
        $this->addSql('DROP TABLE mastery');
    }
}
