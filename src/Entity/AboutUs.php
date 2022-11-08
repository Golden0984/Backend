<?php

namespace App\Entity;

use App\Repository\AboutUsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutUsRepository::class)]
class AboutUs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $imagen = null;

    #[ORM\Column(length: 255)]
    private ?string $titulacion = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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

    public function getTitulacion(): ?string
    {
        return $this->titulacion;
    }

    public function setTitulacion(string $titulacion): self
    {
        $this->titulacion = $titulacion;

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
}
