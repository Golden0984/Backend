<?php

namespace App\Entity;

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

}
