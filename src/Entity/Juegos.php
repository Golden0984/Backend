<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Juegos
 *
 * @ORM\Table(name="juegos")
 * @ORM\Entity
 */
class Juegos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_juego", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=100, nullable=false)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_juego", type="string", length=500, nullable=false)
     */
    private $nombreJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_juego", type="string", length=200, nullable=false)
     */
    private $tipoJuego;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_lanzamiento", type="datetime", nullable=true)
     */
    private $fechaLanzamiento;

    public function getIdJuego(): ?int
    {
        return $this->idJuego;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getNombreJuego(): ?string
    {
        return $this->nombreJuego;
    }

    public function setNombreJuego(string $nombreJuego): self
    {
        $this->nombreJuego = $nombreJuego;

        return $this;
    }

    public function getTipoJuego(): ?string
    {
        return $this->tipoJuego;
    }

    public function setTipoJuego(string $tipoJuego): self
    {
        $this->tipoJuego = $tipoJuego;

        return $this;
    }

    public function getFechaLanzamiento(): ?\DateTimeInterface
    {
        return $this->fechaLanzamiento;
    }

    public function setFechaLanzamiento(?\DateTimeInterface $fechaLanzamiento): self
    {
        $this->fechaLanzamiento = $fechaLanzamiento;

        return $this;
    }


}
