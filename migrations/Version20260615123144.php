<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260615123144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(20) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, nationalite VARCHAR(255) DEFAULT NULL, date_naissance DATETIME DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, job_categorie VARCHAR(255) NOT NULL, experience VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_mise_ajour DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_societe VARCHAR(255) NOT NULL, type_activite VARCHAR(255) NOT NULL, nom_contact VARCHAR(255) NOT NULL, post_contact VARCHAR(255) NOT NULL, tel_contact VARCHAR(20) DEFAULT NULL, email_contact VARCHAR(255) NOT NULL, notes VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(255) DEFAULT NULL, client VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, active TINYINT NOT NULL, notes VARCHAR(255) DEFAULT NULL, job_title VARCHAR(255) DEFAULT NULL, job_type VARCHAR(255) DEFAULT NULL, job_category VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE job');
    }
}
