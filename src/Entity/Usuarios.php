<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity()
 *
 * */
class Usuarios
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_usuario", type="string", length=200, nullable=false)
     */
    private $nombreUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=200, nullable=false)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Torneos", inversedBy="idUsuario")
     * @ORM\JoinTable(name="participa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_usuario", referencedColumnName="ID_usuario")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_torneo", referencedColumnName="ID_torneo")
     *   }
     * )
     */
    private $idTorneo = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Servicios", inversedBy="idUsuario")
     * @ORM\JoinTable(name="realiza",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_usuario", referencedColumnName="ID_usuario")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_servicio", referencedColumnName="ID_servicio")
     *   }
     * )
     */
    private $idServicio = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTorneo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idServicio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function getNombreUsuario(): ?string
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario(string $nombreUsuario): self
    {
        $this->nombreUsuario = $nombreUsuario;

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

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(?\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * @return Collection<int, Torneos>
     */
    public function getIdTorneo(): Collection
    {
        return $this->idTorneo;
    }

    public function addIdTorneo(Torneos $idTorneo): self
    {
        if (!$this->idTorneo->contains($idTorneo)) {
            $this->idTorneo->add($idTorneo);
        }

        return $this;
    }

    public function removeIdTorneo(Torneos $idTorneo): self
    {
        $this->idTorneo->removeElement($idTorneo);

        return $this;
    }

    /**
     * @return Collection<int, Servicios>
     */
    public function getIdServicio(): Collection
    {
        return $this->idServicio;
    }

    public function addIdServicio(Servicios $idServicio): self
    {
        if (!$this->idServicio->contains($idServicio)) {
            $this->idServicio->add($idServicio);
        }

        return $this;
    }

    public function removeIdServicio(Servicios $idServicio): self
    {
        $this->idServicio->removeElement($idServicio);

        return $this;
    }

}
