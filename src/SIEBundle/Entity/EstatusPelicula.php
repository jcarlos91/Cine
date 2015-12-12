<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstatusPelicula
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\EstatusPeliculaRepository")
 */
class EstatusPelicula
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
     * @ORM\Column(name="estatus", type="string", length=255)
     */
    private $estatus;


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
     * Set estatus
     *
     * @param string $estatus
     *
     * @return EstatusPelicula
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
}

