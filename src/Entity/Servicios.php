<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servicios
 *
 * @ORM\Table(name="servicios", indexes={@ORM\Index(name="fk1_servi_juego", columns={"ID_juego"})})
 * @ORM\Entity
 */
class Servicios
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_servicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_juego", type="string", length=50, nullable=false)
     */
    private $nombreJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \Juegos
     *
     * @ORM\ManyToOne(targetEntity="Juegos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_juego", referencedColumnName="ID_juego")
     * })
     */
    private $idJuego;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="idServicio")
     */
    private $idUsuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdServicio(): ?int
    {
        return $this->idServicio;
    }

    public function getNombreJuego(): ?string
    {
        return $this->nombreJuego;
    }

    public function setNombreJuego(string $nombreJuego): self
    {
        $this->nombreJuego = $nombreJuego;

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
        return $this->fechaInicio;
    }

    public function setFechaInicio(?\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getIdJuego(): ?Juegos
    {
        return $this->idJuego;
    }

    public function setIdJuego(?Juegos $idJuego): self
    {
        $this->idJuego = $idJuego;

        return $this;
    }

    /**
     * @return Collection<int, Usuarios>
     */
    public function getIdUsuario(): Collection
    {
        return $this->idUsuario;
    }

    public function addIdUsuario(Usuarios $idUsuario): self
    {
        if (!$this->idUsuario->contains($idUsuario)) {
            $this->idUsuario->add($idUsuario);
            $idUsuario->addIdServicio($this);
        }

        return $this;
    }

    public function removeIdUsuario(Usuarios $idUsuario): self
    {
        if ($this->idUsuario->removeElement($idUsuario)) {
            $idUsuario->removeIdServicio($this);
        }

        return $this;
    }

}
