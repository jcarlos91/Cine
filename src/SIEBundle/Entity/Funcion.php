<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\FuncionRepository")
 */
class Funcion
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
      * @var \SIEBundle\Entity\Peliculas
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pelicula", referencedColumnName="id")
     *   })
     */
    private $pelicula;


    /**
     * @var time
     *
     * @ORM\Column(name="hora", type="time")
     *
     */
    private $hora;

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
     * Set pelicula
     *
     * @param \SIEBundle\Entity\Peliculas $pelicula
     *
     * @return Funcion
     */
    public function setPelicula(\SIEBundle\Entity\Peliculas $pelicula = null)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    /**
     * Get pelicula
     *
     * @return \SIEBundle\Entity\Peliculas
     */
    public function getPelicula()
    {
        return $this->pelicula;
    }

    /**
     * Set hora
     *
     * @param time $hora
     *
     * @return Funcion
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return time
     */
    public function getHora()
    {
        return $this->hora;
    }

}

