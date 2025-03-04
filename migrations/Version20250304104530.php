<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250304104530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE licencie_club (licencie_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_7F059976B56DCD74 (licencie_id), INDEX IDX_7F05997661190A32 (club_id), PRIMARY KEY(licencie_id, club_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE licencie_club ADD CONSTRAINT FK_7F059976B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE licencie_club ADD CONSTRAINT FK_7F05997661190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe ADD licencies_id INT DEFAULT NULL, ADD equipes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15B0AC65CD FOREIGN KEY (licencies_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15737800BA FOREIGN KEY (equipes_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_2449BA15B0AC65CD ON equipe (licencies_id)');
        $this->addSql('CREATE INDEX IDX_2449BA15737800BA ON equipe (equipes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie_club DROP FOREIGN KEY FK_7F059976B56DCD74');
        $this->addSql('ALTER TABLE licencie_club DROP FOREIGN KEY FK_7F05997661190A32');
        $this->addSql('DROP TABLE licencie_club');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15B0AC65CD');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15737800BA');
        $this->addSql('DROP INDEX IDX_2449BA15B0AC65CD ON equipe');
        $this->addSql('DROP INDEX IDX_2449BA15737800BA ON equipe');
        $this->addSql('ALTER TABLE equipe DROP licencies_id, DROP equipes_id');
    }
}
