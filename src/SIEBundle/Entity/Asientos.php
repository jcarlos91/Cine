<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asientos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\AsientosRepository")
 */
class Asientos
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
     * @var \SIEBundle\Entity\Sala
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Sala")
     * @@RM\JoinColumns({
     *  @ORM\JoinColumn(name="tipo_sala", referencedColumnName="id")    
     * })
     */
    private $sala;

    /**
     * @var integer
     *
     * @ORM\Column(name="fila", type="integer")
     */
    private $fila;

    /**
     * @var integer
     *
     * @ORM\Column(name="columna", type="integer")
     */
    private $columna;

    /**
      * @var \SIEBundle\Entity\EstadoAsientos
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\EstadoAsientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado", referencedColumnName="id")
     *   })
     */
    private $estado;


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
     * Set sala
     *
     * @param \SIEBundle\Entity\Sala
     *
     * @return Asientos
     */
    public function setSala(\SIEBunlde\Entity\Sala $sala = null)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return \SIEBundle\Entity\Sala
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set fila
     *
     * @param integer $fila
     *
     * @return Asientos
     */
    public function setFila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get fila
     *
     * @return integer
     */
    public function getFila()
    {
        return $this->fila;
    }

    /**
     * Set columna
     *
     * @param integer $columna
     *
     * @return Asientos
     */
    public function setColumna($columna)
    {
        $this->columna = $columna;

        return $this;
    }

    /**
     * Get columna
     *
     * @return integer
     */
    public function getColumna()
    {
        return $this->columna;
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
}

