<?php

namespace App\Entity;

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

}
