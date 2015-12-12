<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Peliculas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\PeliculasRepository")
 * @UniqueEntity(fields="titulo", message="Pelicula alredy exist")
 */
class Peliculas
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
     * @ORM\Column(name="titulo", type="string", length=255, unique=true)
     */
    private $titulo;

    /**
     * @var \SIEBundle\Entity\Categoria
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria", referencedColumnName="id")
     *   })
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=255)
     */
    private $duracion;

    /**
     * @var \SIEBundle\Entity\EstatusPelicula
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\EstatusPelicula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estatus", referencedColumnName="id")
     *  })
     **/
    private $estatus;

    /**
     * \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="SIEBundle\Entity\Cartelera", mappedBy="peliculaId")
     */
    private $carteleras;

    /**
     * Constructor
     */
    public function __construct()
    {
        //$this->peliculaId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->carteleras = new ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Peliculas
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set categoria
     *
     * @param \SIEBundle\Entity\Categoria
     *
     * @return Peliculas
     */
    public function setCategoria(\SIEBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \SIEBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Peliculas
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Peliculas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Peliculas
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set estatus
     *
     * @param \SIEBundle\Entity\EstatusPelicula
     *
     * @return Peliculas
     */
    public function setEstatus(\SIEBundle\Entity\EstatusPelicula $estatus = null)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return \SIEBundle\Entity\EstatusPelicula
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
    
    /**
     * Add cartelera
     *
     * @param \SIEBundle\Entity\Cartelera $cartelera
     * @return Ahorro
     */
    public function addCarteleras(\SIEBundle\Entity\Cartelera $carteleras)
    {
        $this->carteleras[] = $carteleras;

        return $this;
    }

    /**
     * Remove Cartelera
     *
     * @param \SIEBundle\Entity\Cartelera $cartelera
     */
    public function removeCarteleras(\SIEBundle\Entity\Cartelera $carteleras)
    {
        $this->carteleras>removeElement($carteleras);
    }

    /**
     * Get cartelera
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarteleras()
    {
        return $this->carteleras;
    }
}

