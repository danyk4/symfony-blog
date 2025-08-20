<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250820130040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE IF NOT EXISTS `feedback` (
                id int unsigned AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                subject VARCHAR(255) NULL,
                message TEXT NOT NULL,  
                created_at datetime NOT NULL,
                constraint id primary key (id)
            );
        ');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS `feedback`');

    }
}
