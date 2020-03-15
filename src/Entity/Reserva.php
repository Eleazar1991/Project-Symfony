<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Reserva
 *
 * @ORM\Table(name="reservas", indexes={@ORM\Index(name="fk_reserva_servicio", columns={"servicio_id"}),@ORM\Index(name="fk_reserva_horario", columns={"horario_id"})})
 * @ORM\Entity
 */
class Reserva
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_cliente", type="string", length=255, nullable=true)
     */
    private $nombreCliente;

    /**
     * @var \Servicio
     *
     * @ORM\ManyToOne(targetEntity="Servicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="servicio_id", referencedColumnName="id")
     * })
     */
    private $servicio;

    /**
     * @var \Horarios
     *
     * @ORM\ManyToOne(targetEntity="Horario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="horario_id", referencedColumnName="id")
     * })
     */
    private $horario;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCliente(): ?string
    {
        return $this->nombreCliente;
    }

    public function setNombreCliente(?string $nombreCliente): self
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    public function getServicio(): ?Servicio
    {
        return $this->servicio;
    }

    public function setServicio(?Servicio $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getHorario(): ?Horario
    {
        return $this->horario;
    }

    public function setHorario(?Horario $horario): self
    {
        $this->horario = $horario;

        return $this;
    }



}
