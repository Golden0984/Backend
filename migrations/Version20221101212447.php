<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101212447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE juegos (ID_juego INT AUTO_INCREMENT NOT NULL, imagen VARCHAR(100) NOT NULL, nombre_juego VARCHAR(500) NOT NULL, tipo_juego VARCHAR(200) NOT NULL, fecha_lanzamiento DATETIME DEFAULT NULL, PRIMARY KEY(ID_juego)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicios (ID_servicio INT AUTO_INCREMENT NOT NULL, nombre_juego VARCHAR(50) NOT NULL, descripcion VARCHAR(500) NOT NULL, fecha_inicio DATETIME DEFAULT NULL, ID_juego INT DEFAULT NULL, INDEX fk1_servi_juego (ID_juego), PRIMARY KEY(ID_servicio)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE torneos (ID_torneo INT AUTO_INCREMENT NOT NULL, tipo_juego VARCHAR(50) NOT NULL, nombre_juego VARCHAR(500) NOT NULL, descripcion VARCHAR(500) NOT NULL, premio INT NOT NULL, coste_entrada INT NOT NULL, fecha_inicio DATETIME DEFAULT NULL, fecha_fin DATETIME DEFAULT NULL, PRIMARY KEY(ID_torneo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (ID_usuario INT AUTO_INCREMENT NOT NULL, nombre_usuario VARCHAR(500) NOT NULL, email VARCHAR(100) NOT NULL, nickname VARCHAR(500) NOT NULL, pwd VARCHAR(255) NOT NULL, fecha_creacion DATETIME DEFAULT NULL, UNIQUE INDEX email (email), PRIMARY KEY(ID_usuario)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participa (ID_usuario INT NOT NULL, ID_torneo INT NOT NULL, INDEX IDX_E926CCD3154985E (ID_usuario), INDEX IDX_E926CCD215B36E6 (ID_torneo), PRIMARY KEY(ID_usuario, ID_torneo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realiza (ID_usuario INT NOT NULL, ID_servicio INT NOT NULL, INDEX IDX_C363A6CE3154985E (ID_usuario), INDEX IDX_C363A6CE529C92B8 (ID_servicio), PRIMARY KEY(ID_usuario, ID_servicio)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE servicios ADD CONSTRAINT FK_C07E802F28A25AC7 FOREIGN KEY (ID_juego) REFERENCES juegos (ID_juego)');
        $this->addSql('ALTER TABLE participa ADD CONSTRAINT FK_E926CCD3154985E FOREIGN KEY (ID_usuario) REFERENCES usuarios (ID_usuario)');
        $this->addSql('ALTER TABLE participa ADD CONSTRAINT FK_E926CCD215B36E6 FOREIGN KEY (ID_torneo) REFERENCES torneos (ID_torneo)');
        $this->addSql('ALTER TABLE realiza ADD CONSTRAINT FK_C363A6CE3154985E FOREIGN KEY (ID_usuario) REFERENCES usuarios (ID_usuario)');
        $this->addSql('ALTER TABLE realiza ADD CONSTRAINT FK_C363A6CE529C92B8 FOREIGN KEY (ID_servicio) REFERENCES servicios (ID_servicio)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servicios DROP FOREIGN KEY FK_C07E802F28A25AC7');
        $this->addSql('ALTER TABLE participa DROP FOREIGN KEY FK_E926CCD3154985E');
        $this->addSql('ALTER TABLE participa DROP FOREIGN KEY FK_E926CCD215B36E6');
        $this->addSql('ALTER TABLE realiza DROP FOREIGN KEY FK_C363A6CE3154985E');
        $this->addSql('ALTER TABLE realiza DROP FOREIGN KEY FK_C363A6CE529C92B8');
        $this->addSql('DROP TABLE juegos');
        $this->addSql('DROP TABLE servicios');
        $this->addSql('DROP TABLE torneos');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE participa');
        $this->addSql('DROP TABLE realiza');
    }
}
