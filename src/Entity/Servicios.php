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

    #[ORM\ManyToMany(targetEntity: Usuarios::class, inversedBy: 'id_servicios')]
    private Collection $id_usuario;

    public function __construct()
    {
        $this->id_usuario = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Usuarios>
     */
    public function getIdUsuario(): Collection
    {
        return $this->id_usuario;
    }

    public function addIdUsuario(Usuarios $idUsuario): self
    {
        if (!$this->id_usuario->contains($idUsuario)) {
            $this->id_usuario->add($idUsuario);
        }

        return $this;
    }

    public function removeIdUsuario(Usuarios $idUsuario): self
    {
        $this->id_usuario->removeElement($idUsuario);

        return $this;
    }
}
