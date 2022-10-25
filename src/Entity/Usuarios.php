<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
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
     * @ORM\Column(name="nombre_usuario", type="string", length=500, nullable=false)
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
     * @ORM\Column(name="nickname", type="string", length=500, nullable=false)
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

}
