<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260114135151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, UNIQUE INDEX UNIQ_6336F6A7FB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, pokedex_id INT DEFAULT NULL, INDEX IDX_62DC90F3372A5D14 (pokedex_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_6336F6A7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_6336F6A7FB88E14F');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3372A5D14');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE `user`');
    }
}
