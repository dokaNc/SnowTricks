<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314170216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F3B153154');
        $this->addSql('DROP INDEX IDX_C53D045F3B153154 ON image');
        $this->addSql('ALTER TABLE image ADD tricks_id_id INT NOT NULL, DROP tricks_id');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA674A03E FOREIGN KEY (tricks_id_id) REFERENCES tricks (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FA674A03E ON image (tricks_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA674A03E');
        $this->addSql('DROP INDEX IDX_C53D045FA674A03E ON image');
        $this->addSql('ALTER TABLE image ADD tricks_id INT DEFAULT NULL, DROP tricks_id_id');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F3B153154 FOREIGN KEY (tricks_id) REFERENCES tricks (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F3B153154 ON image (tricks_id)');
    }
}
