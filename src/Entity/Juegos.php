<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Juegos
 *
 * @ORM\Table(name="juegos")
 * @ORM\Entity
 */
class Juegos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_juego", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=100, nullable=false)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_juego", type="string", length=500, nullable=false)
     */
    private $nombreJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_juego", type="string", length=200, nullable=false)
     */
    private $tipoJuego;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_lanzamiento", type="datetime", nullable=true)
     */
    private $fechaLanzamiento;


}
