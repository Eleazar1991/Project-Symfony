<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Servicio
 *
 * @ORM\Table(name="servicios")
 * @ORM\Entity
 */
class Servicio
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
     * @ORM\Column(name="precio", type="integer", nullable=true)
     */
    private $precio;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario",mappedBy="servicio")
     */
    private $comentarios;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Traduccion",mappedBy="servicio")
     */
    private $traducciones;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Horario",mappedBy="servicio")
     */
    private $horarios;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Reserva",mappedBy="servicio")
     */
    private $reservas;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(?int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     *
     *
     * @return Collection|Comentario[]
     */
    public function getComentarios(): Collection{
        return $this->comentarios;
    }

    /**
     *
     *
     * @return Collection|Traduccion[]
     */
    public function getTraducciones(): Collection{
        return $this->traducciones;
    }
    
    /**
     *
     *
     * @return Collection|Horario[]
     */

    public function getHorarios(): Collection{
        return $this->horarios;
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
