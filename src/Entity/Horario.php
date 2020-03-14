<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Horario
 *
 * @ORM\Table(name="horarios", indexes={@ORM\Index(name="fk_horario_reserva", columns={"reserva_id"}), @ORM\Index(name="fk_horario_servicio", columns={"servicio_id"})})
 * @ORM\Entity
 */
class Horario
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="dia", type="datetime", nullable=true)
     */
    private $dia;

    /**
     * @var \Reserva
     *
     * @ORM\ManyToOne(targetEntity="Reserva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reserva_id", referencedColumnName="id")
     * })
     */
    private $reserva;

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
     *
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Hora",mappedBy="horario")
     */
    private $horas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDia(): ?\DateTimeInterface
    {
        return $this->dia;
    }

    public function setDia(?\DateTimeInterface $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getReserva(): ?Reservas
    {
        return $this->reserva;
    }

    public function setReserva(?Reservas $reserva): self
    {
        $this->reserva = $reserva;

        return $this;
    }

    public function getServicio(): ?Servicios
    {
        return $this->servicio;
    }

    public function setServicio(?Servicios $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     *
     *
     * @return Collection|Horas[]
     */

    public function getHoras(): Collection{
        return $this->horas;
    }

}
