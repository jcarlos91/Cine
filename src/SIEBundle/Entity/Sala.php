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
}

