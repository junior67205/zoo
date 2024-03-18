<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318131751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux ADD animaux_race_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animaux ADD CONSTRAINT FK_9ABE194DE1B976E5 FOREIGN KEY (animaux_race_id) REFERENCES race (id)');
        $this->addSql('CREATE INDEX IDX_9ABE194DE1B976E5 ON animaux (animaux_race_id)');
        $this->addSql('ALTER TABLE habitats ADD habitats_animaux_id INT NOT NULL');
        $this->addSql('ALTER TABLE habitats ADD CONSTRAINT FK_B5E492F3E6224D4F FOREIGN KEY (habitats_animaux_id) REFERENCES animaux (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B5E492F3E6224D4F ON habitats (habitats_animaux_id)');
        $this->addSql('ALTER TABLE images ADD animaux_id INT DEFAULT NULL, ADD nom VARCHAR(255) DEFAULT NULL, ADD size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AA9DAECAA ON images (animaux_id)');
        $this->addSql('ALTER TABLE race CHANGE nom nom_race VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux DROP FOREIGN KEY FK_9ABE194DE1B976E5');
        $this->addSql('DROP INDEX IDX_9ABE194DE1B976E5 ON animaux');
        $this->addSql('ALTER TABLE animaux DROP animaux_race_id');
        $this->addSql('ALTER TABLE race CHANGE nom_race nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA9DAECAA');
        $this->addSql('DROP INDEX IDX_E01FBE6AA9DAECAA ON images');
        $this->addSql('ALTER TABLE images DROP animaux_id, DROP nom, DROP size, DROP updated_at');
        $this->addSql('ALTER TABLE habitats DROP FOREIGN KEY FK_B5E492F3E6224D4F');
        $this->addSql('DROP INDEX UNIQ_B5E492F3E6224D4F ON habitats');
        $this->addSql('ALTER TABLE habitats DROP habitats_animaux_id');
    }
}
