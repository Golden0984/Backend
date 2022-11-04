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

    #[ORM\OneToMany(mappedBy: 'usuarios', targetEntity: Servicios::class)]
    private Collection $servicios;

    #[ORM\ManyToOne(inversedBy: 'usuarios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Torneos $torneo = null;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
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
    public function getServicios(): Collection
    {
        return $this->servicios;
    }

    public function addServicio(Servicios $servicio): self
    {
        if (!$this->servicios->contains($servicio)) {
            $this->servicios->add($servicio);
            $servicio->setUsuarios($this);
        }

        return $this;
    }

    public function removeServicio(Servicios $servicio): self
    {
        if ($this->servicios->removeElement($servicio)) {
            // set the owning side to null (unless already changed)
            if ($servicio->getUsuarios() === $this) {
                $servicio->setUsuarios(null);
            }
        }

        return $this;
    }

    public function getTorneo(): ?Torneos
    {
        return $this->torneo;
    }

    public function setTorneo(?Torneos $torneo): self
    {
        $this->torneo = $torneo;

        return $this;
    }

}
