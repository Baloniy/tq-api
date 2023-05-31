<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230531182515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE equipments ALTER bonus DROP NOT NULL');
        $this->addSql('ALTER TABLE equipments ALTER summons DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE equipments ALTER bonus SET NOT NULL');
        $this->addSql('ALTER TABLE equipments ALTER summons SET NOT NULL');
    }
}
