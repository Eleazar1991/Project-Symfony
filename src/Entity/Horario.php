<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Horario
 *
 * @ORM\Table(name="horarios", indexes={@ORM\Index(name="fk_horario_servicio", columns={"servicio_id"})})
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
     * @var int|null
     *
     * @ORM\Column(name="hora", type="integer", nullable=true)
     */
    private $hora;

        /**
     * @var boolean|null
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=true)
     */
    private $disponible;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Reserva",mappedBy="horario")
     */
    private $reservas;


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

    public function getHora(): ?int
    {
        return $this->hora;
    }

    public function setHora(?int $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(?bool $disponible): self
    {
        $this->disponible = $disponible;

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

    /**
     *
     *
     * @return Collection|Reserva[]
     */

    public function getReservas(): Collection{
        return $this->reservas;
    }
}
