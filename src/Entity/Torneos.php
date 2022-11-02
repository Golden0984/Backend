<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Torneos
 *
 * @ORM\Table(name="torneos")
 * @ORM\Entity
 */
class Torneos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_torneo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTorneo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_juego", type="string", length=50, nullable=false)
     */
    private $tipoJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_juego", type="string", length=500, nullable=false)
     */
    private $nombreJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="premio", type="integer", nullable=false)
     */
    private $premio;

    /**
     * @var int
     *
     * @ORM\Column(name="coste_entrada", type="integer", nullable=false)
     */
    private $costeEntrada;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=true)
     */
    private $fechaFin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="idTorneo")
     */
    private $idUsuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdTorneo(): ?int
    {
        return $this->idTorneo;
    }

    public function getTipoJuego(): ?string
    {
        return $this->tipoJuego;
    }

    public function setTipoJuego(string $tipoJuego): self
    {
        $this->tipoJuego = $tipoJuego;

        return $this;
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

    public function getPremio(): ?int
    {
        return $this->premio;
    }

    public function setPremio(int $premio): self
    {
        $this->premio = $premio;

        return $this;
    }

    public function getCosteEntrada(): ?int
    {
        return $this->costeEntrada;
    }

    public function setCosteEntrada(int $costeEntrada): self
    {
        $this->costeEntrada = $costeEntrada;

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

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(?\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

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
            $idUsuario->addIdTorneo($this);
        }

        return $this;
    }

    public function removeIdUsuario(Usuarios $idUsuario): self
    {
        if ($this->idUsuario->removeElement($idUsuario)) {
            $idUsuario->removeIdTorneo($this);
        }

        return $this;
    }

}
