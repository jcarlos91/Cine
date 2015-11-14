<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sala
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\SalaRepository")
 */
class Sala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_sala", type="string", length=255)
     */
    private $tipoSala;
   
    /* @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="SIEBundle\Entity\Asientos", mappedBy="sala", fetch="EXTRA_LAZY")
     */
    private $asientos;

    public function __construct()
    {
        $this->asientos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipoSala
     *
     * @param string $tipoSala
     *
     * @return Sala
     */
    public function setTipoSala($tipoSala)
    {
        $this->tipoSala = $tipoSala;

        return $this;
    }

    /**
     * Get tipoSala
     *
     * @return string
     */
    public function getTipoSala()
    {
        return $this->tipoSala;
    }

    /**
     * Set estado
     *
     * @param \SIEBundle\Entity\EstadoAsiento $estado
     *
     * @return Asientos
     */
    public function setEstado(\SIEBundle\Entity\EstadoAsientos $estado = null){
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \SIEBundle\Entity\EstadoAsientos
     */
    public function getEstado(){
        return $this->estado;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsientos()
    {
        return $this->asientos;
    }
}

