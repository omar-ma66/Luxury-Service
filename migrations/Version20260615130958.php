<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260615130958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

 public function up(Schema $schema): void
    {
        // Table candidature
        $this->addSql('ALTER TABLE candidature ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E33BD3B8A76ED395 ON candidature (user_id)');
        
        // Table de liaison client_job (Déjà corrigée)
        $this->addSql('ALTER TABLE client_job ADD CONSTRAINT FK_CLIENT_JOB_CLIENT FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_job ADD CONSTRAINT FK_CLIENT_JOB_JOB FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        
        // Table de liaison job_candidature (CORRECTIONS ICI)
        $this->addSql('ALTER TABLE job_candidature ADD CONSTRAINT FK_JOB_CANDIDATURE_JOB FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_candidature ADD CONSTRAINT FK_JOB_CANDIDATURE_CANDIDATURE FOREIGN KEY (candidature_id) REFERENCES candidature (id) ON DELETE CASCADE');
    }
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8A76ED395');
        $this->addSql('DROP INDEX IDX_E33BD3B8A76ED395 ON candidature');
        $this->addSql('ALTER TABLE candidature DROP user_id');
        $this->addSql('ALTER TABLE client_job DROP FOREIGN KEY FK_DC7C735C19EB6921');
        $this->addSql('ALTER TABLE client_job DROP FOREIGN KEY FK_DC7C735CBE04EA9');
        $this->addSql('ALTER TABLE job_candidature DROP FOREIGN KEY FK_8057C8F1BE04EA9');
        $this->addSql('ALTER TABLE job_candidature DROP FOREIGN KEY FK_8057C8F1B6121583');
    }
}
