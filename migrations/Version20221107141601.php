<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107141601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE juegos (id INT AUTO_INCREMENT NOT NULL, nombre_juego VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha_lanzamiento DATE NOT NULL, imagen VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicios (id INT AUTO_INCREMENT NOT NULL, usuarios_id INT NOT NULL, juegos_id INT NOT NULL, nombre_juego VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha_inicio DATE NOT NULL, INDEX IDX_C07E802FF01D3B25 (usuarios_id), INDEX IDX_C07E802FFC632F0C (juegos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE torneos (id INT AUTO_INCREMENT NOT NULL, tipo_juego VARCHAR(255) NOT NULL, nombre_juego VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, premio VARCHAR(255) NOT NULL, precio INT NOT NULL, fecha_inicio DATE NOT NULL, fecha_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, torneo_id INT NOT NULL, correo VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, contrasena VARCHAR(255) NOT NULL, nickname VARCHAR(255) NOT NULL, INDEX IDX_EF687F2A0139802 (torneo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE servicios ADD CONSTRAINT FK_C07E802FF01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE servicios ADD CONSTRAINT FK_C07E802FFC632F0C FOREIGN KEY (juegos_id) REFERENCES juegos (id)');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2A0139802 FOREIGN KEY (torneo_id) REFERENCES torneos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servicios DROP FOREIGN KEY FK_C07E802FF01D3B25');
        $this->addSql('ALTER TABLE servicios DROP FOREIGN KEY FK_C07E802FFC632F0C');
        $this->addSql('ALTER TABLE usuarios DROP FOREIGN KEY FK_EF687F2A0139802');
        $this->addSql('DROP TABLE juegos');
        $this->addSql('DROP TABLE servicios');
        $this->addSql('DROP TABLE torneos');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
