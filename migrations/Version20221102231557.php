<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102231557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crear (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, servicio_id INT NOT NULL, date DATE NOT NULL, time TIME NOT NULL, INDEX IDX_5577D1AADB38439E (usuario_id), INDEX IDX_5577D1AA71CAA3E7 (servicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unirse (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, servicio_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_E4BE4FA8DB38439E (usuario_id), INDEX IDX_E4BE4FA871CAA3E7 (servicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nickname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, register DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE crear ADD CONSTRAINT FK_5577D1AADB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE crear ADD CONSTRAINT FK_5577D1AA71CAA3E7 FOREIGN KEY (servicio_id) REFERENCES servicio (id)');
        $this->addSql('ALTER TABLE unirse ADD CONSTRAINT FK_E4BE4FA8DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE unirse ADD CONSTRAINT FK_E4BE4FA871CAA3E7 FOREIGN KEY (servicio_id) REFERENCES servicio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE crear DROP FOREIGN KEY FK_5577D1AADB38439E');
        $this->addSql('ALTER TABLE crear DROP FOREIGN KEY FK_5577D1AA71CAA3E7');
        $this->addSql('ALTER TABLE unirse DROP FOREIGN KEY FK_E4BE4FA8DB38439E');
        $this->addSql('ALTER TABLE unirse DROP FOREIGN KEY FK_E4BE4FA871CAA3E7');
        $this->addSql('DROP TABLE crear');
        $this->addSql('DROP TABLE servicio');
        $this->addSql('DROP TABLE unirse');
        $this->addSql('DROP TABLE usuario');
    }
}
