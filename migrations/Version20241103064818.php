<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241103064818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, niveaux VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE filiere ADD id_niveaux_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE filiere ADD CONSTRAINT FK_2ED05D9EF4E37D9 FOREIGN KEY (id_niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE INDEX IDX_2ED05D9EF4E37D9 ON filiere (id_niveaux_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE filiere DROP FOREIGN KEY FK_2ED05D9EF4E37D9');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP INDEX IDX_2ED05D9EF4E37D9 ON filiere');
        $this->addSql('ALTER TABLE filiere DROP id_niveaux_id');
    }
}
