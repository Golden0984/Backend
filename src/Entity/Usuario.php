<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $register = null;

    #[ORM\OneToMany(mappedBy: 'servicio', targetEntity: Crear::class)]
    private Collection $servicios;

    #[ORM\OneToMany(mappedBy: 'servicio', targetEntity: Unirse::class)]
    private Collection $unirses;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
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

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRegister(): ?\DateTimeInterface
    {
        return $this->register;
    }

    public function setRegister(\DateTimeInterface $register): self
    {
        $this->register = $register;

        return $this;
    }

    /**
     * @return Collection<int, Crear>
     */
    public function getservicios(): Collection
    {
        return $this->servicios;
    }

    public function addCrear(Crear $crear): self
    {
        if (!$this->servicios->contains($crear)) {
            $this->servicios->add($crear);
            $crear->setUsuario($this);
        }

        return $this;
    }

    public function removeCrear(Crear $crear): self
    {
        if ($this->servicios->removeElement($crear)) {
            // set the owning side to null (unless already changed)
            if ($crear->getUsuario() === $this) {
                $crear->setUsuario(null);
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
            $unirse->setUsuario($this);
        }

        return $this;
    }

    public function removeUnirse(Unirse $unirse): self
    {
        if ($this->unirses->removeElement($unirse)) {
            // set the owning side to null (unless already changed)
            if ($unirse->getUsuario() === $this) {
                $unirse->setUsuario(null);
            }
        }

        return $this;
    }
}
