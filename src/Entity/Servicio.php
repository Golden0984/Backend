<?php

namespace App\Entity;

use App\Repository\ServicioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicioRepository::class)]
class Servicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: Crear::class)]
    private Collection $usuarios;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: Unirse::class)]
    private Collection $unirses;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->unirses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection<int, Crear>
     */
    public function getusuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addCrear(Crear $crear): self
    {
        if (!$this->usuarios->contains($crear)) {
            $this->usuarios->add($crear);
            $crear->setServicio($this);
        }

        return $this;
    }

    public function removeCrear(Crear $crear): self
    {
        if ($this->usuarios->removeElement($crear)) {
            // set the owning side to null (unless already changed)
            if ($crear->getServicio() === $this) {
                $crear->setServicio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Unirse>
     */
    public function getUnirses(): Collection
    {
        return $this->unirses;
    }

    public function addUnirse(Unirse $unirse): self
    {
        if (!$this->unirses->contains($unirse)) {
            $this->unirses->add($unirse);
            $unirse->setServicio($this);
        }

        return $this;
    }

    public function removeUnirse(Unirse $unirse): self
    {
        if ($this->unirses->removeElement($unirse)) {
            // set the owning side to null (unless already changed)
            if ($unirse->getServicio() === $this) {
                $unirse->setServicio(null);
            }
        }

        return $this;
    }
}
