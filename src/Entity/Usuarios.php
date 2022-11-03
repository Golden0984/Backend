<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $contrasena = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\ManyToMany(targetEntity: Servicios::class, mappedBy: 'id_usuario')]
    private Collection $id_servicios;

    public function __construct()
    {
        $this->id_servicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
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

    public function getContrasena(): ?string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): self
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return Collection<int, Servicios>
     */
    public function getIdServicios(): Collection
    {
        return $this->id_servicios;
    }

    public function addIdServicio(Servicios $idServicio): self
    {
        if (!$this->id_servicios->contains($idServicio)) {
            $this->id_servicios->add($idServicio);
            $idServicio->addIdUsuario($this);
        }

        return $this;
    }

    public function removeIdServicio(Servicios $idServicio): self
    {
        if ($this->id_servicios->removeElement($idServicio)) {
            $idServicio->removeIdUsuario($this);
        }

        return $this;
    }
}
