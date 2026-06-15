<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260615125229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_job (client_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_DC7C735C19EB6921 (client_id), INDEX IDX_DC7C735CBE04EA9 (job_id), PRIMARY KEY (client_id, job_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE job_candidature (job_id INT NOT NULL, candidature_id INT NOT NULL, INDEX IDX_8057C8F1BE04EA9 (job_id), INDEX IDX_8057C8F1B6121583 (candidature_id), PRIMARY KEY (job_id, candidature_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE client_job ADD CONSTRAINT FK_DC7C735C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_job ADD CONSTRAINT FK_DC7C735CBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_candidature ADD CONSTRAINT FK_8057C8F1BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_candidature ADD CONSTRAINT FK_8057C8F1B6121583 FOREIGN KEY (candidature_id) REFERENCES candidature (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_job DROP FOREIGN KEY FK_DC7C735C19EB6921');
        $this->addSql('ALTER TABLE client_job DROP FOREIGN KEY FK_DC7C735CBE04EA9');
        $this->addSql('ALTER TABLE job_candidature DROP FOREIGN KEY FK_8057C8F1BE04EA9');
        $this->addSql('ALTER TABLE job_candidature DROP FOREIGN KEY FK_8057C8F1B6121583');
        $this->addSql('DROP TABLE client_job');
        $this->addSql('DROP TABLE job_candidature');
    }
}
