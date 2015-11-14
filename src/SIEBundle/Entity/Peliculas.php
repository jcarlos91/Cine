<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Peliculas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\PeliculasRepository")
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
     * @ORM\Column(name="titulo", type="string", length=255)
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
     * @var \SIEBundle\Entity\Sala
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sala", referencedColumnName="id")
     *   })
     */
    private $sala;


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
     * @return \SIEBundle\Entity\categoria
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
     * Set sala
     * 
     * @param \SIEBundle\Entity\Sala $sala
     * 
     * @return Peliculas
     */
    public function setSala(\SIEBundle\Entity\Sala $sala = null){
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return \SIEBundle\Entity\Sala
     */
    public function getSala(){
        return $this->sala;
    }
}
