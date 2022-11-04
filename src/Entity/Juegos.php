<?php

namespace App\Entity;

use App\Repository\JuegosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegosRepository::class)]
class Juegos
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
    private ?\DateTimeInterface $fecha_lanzamiento = null;

    #[ORM\OneToMany(mappedBy: 'juegos', targetEntity: Servicios::class)]
    private Collection $servicios;

    #[ORM\Column(length: 255)]
    private ?string $imagen = null;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
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

    public function getFechaLanzamiento(): ?\DateTimeInterface
    {
        return $this->fecha_lanzamiento;
    }

    public function setFechaLanzamiento(\DateTimeInterface $fecha_lanzamiento): self
    {
        $this->fecha_lanzamiento = $fecha_lanzamiento;

        return $this;
    }

    /**
     * @return Collection<int, Servicios>
     */
    public function getServicios(): Collection
    {
        return $this->servicios;
    }

    public function addServicio(Servicios $servicio): self
    {
        if (!$this->servicios->contains($servicio)) {
            $this->servicios->add($servicio);
            $servicio->setJuegos($this);
        }

        return $this;
    }

    public function removeServicio(Servicios $servicio): self
    {
        if ($this->servicios->removeElement($servicio)) {
            // set the owning side to null (unless already changed)
            if ($servicio->getJuegos() === $this) {
                $servicio->setJuegos(null);
            }
        }

        return $this;
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
}
