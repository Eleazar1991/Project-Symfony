<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hora
 *
 * @ORM\Table(name="horas", indexes={@ORM\Index(name="fk_hora_horario", columns={"horario_id"})})
 * @ORM\Entity
 */
class Hora
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
     * @var int|null
     *
     * @ORM\Column(name="hora", type="integer", nullable=true)
     */
    private $hora;

    /**
     * @var \Horario
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

    public function getHora(): ?int
    {
        return $this->hora;
    }

    public function setHora(?int $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getHorario(): ?Horarios
    {
        return $this->horario;
    }

    public function setHorario(?Horarios $horario): self
    {
        $this->horario = $horario;

        return $this;
    }

}
