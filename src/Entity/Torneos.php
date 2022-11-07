<?php

namespace App\Entity;

use App\Repository\TorneosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TorneosRepository::class)]
class Torneos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tipo_juego = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_juego = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255)]
    private ?string $premio = null;

    #[ORM\Column]
    private ?int $precio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_inicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_fin = null;

    #[ORM\OneToMany(mappedBy: 'torneo', targetEntity: Usuarios::class)]
    private Collection $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoJuego(): ?string
    {
        return $this->tipo_juego;
    }

    public function setTipoJuego(string $tipo_juego): self
    {
        $this->tipo_juego = $tipo_juego;

        return $this;
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

    public function getPremio(): ?string
    {
        return $this->premio;
    }

    public function setPremio(string $premio): self
    {
        $this->premio = $premio;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

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

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fecha_fin;
    }

    public function setFechaFin(\DateTimeInterface $fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    /**
     * @return Collection<int, Usuarios>
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuarios $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios->add($usuario);
            $usuario->setTorneo($this);
        }

        return $this;
    }

    public function removeUsuario(Usuarios $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getTorneo() === $this) {
                $usuario->setTorneo(null);
            }
        }

        return $this;
    }
}