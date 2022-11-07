<?php

namespace App\Entity;

use App\Repository\ServiciosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiciosRepository::class)]
class Servicios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_juego = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_inicio = null;

    #[ORM\ManyToOne(inversedBy: 'servicios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuarios $usuarios = null;

    #[ORM\ManyToOne(inversedBy: 'servicios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Juegos $juegos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreJuego(): ?string
    {
        return $this->nombre_juego;
    }

    public function setNombreJuego(string $nombre_juego): self
    {
        $this->nombre_juego = $nombre_juego;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getUsuarios(): ?Usuarios
    {
        return $this->usuarios;
    }

    public function setUsuarios(?Usuarios $usuarios): self
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    public function getJuegos(): ?Juegos
    {
        return $this->juegos;
    }

    public function setJuegos(?Juegos $juegos): self
    {
        $this->juegos = $juegos;

        return $this;
    }
}