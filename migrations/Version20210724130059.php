<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210724130059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, techno VARCHAR(255) NOT NULL, annee DATETIME NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_categorie (fiche_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_CE136BDCDF522508 (fiche_id), INDEX IDX_CE136BDCBCF5E72D (categorie_id), PRIMARY KEY(fiche_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_categorie ADD CONSTRAINT FK_CE136BDCDF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_categorie ADD CONSTRAINT FK_CE136BDCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_categorie DROP FOREIGN KEY FK_CE136BDCDF522508');
        $this->addSql('DROP TABLE fiche');
        $this->addSql('DROP TABLE fiche_categorie');
    }
}
