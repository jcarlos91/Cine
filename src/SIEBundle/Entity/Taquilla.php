<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taquilla
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\TaquillaRepository")
 */
class Taquilla
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
     * @var integer
     *
     * @ORM\Column(name="vendedor", type="integer")
     */
    private $vendedor;

    /**
     * @var \SIEBundle\Entity\Cartelera
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Cartelera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cartelera", referencedColumnName="id")
     *   })
     */
    private $cartelera;

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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var \SIEBundle\Entity\Boleto
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Boleto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="boleto", referencedColumnName="id")
     *   })
     */
    private $boleto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hrVta", type="datetime")
     */
    private $hrVta;


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
     * Set vendedor
     *
     * @param integer $vendedor
     *
     * @return Taquilla
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;

        return $this;
    }

    /**
     * Get vendedor
     *
     * @return integer
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * Set Cartelera
     *
     * @param \SIEBundle\Entity\Cartelera
     *
     * @return Taquilla
     */
    public function setCartelera(\SIEBundle\Entity\Cartelera $cartelera = null){
        $this->cartelera = $cartelera;

        return $this;
    }

    /**
     * Get Cartelera
     *
     * @return \SEIBundle\Entity\Cartelera
     */
    public function getCartelera(){
        return $this->cartelera;
    }

    /**
     * Set fila
     *
     * @param string $fila
     *
     * @return Sala
     */
    public function setFila($fila){
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get Fila
     *
     * @return integer
     */
    public function getFila(){
        return $this->fila;
    }

    /**
     * Set columna
     *
     * @param string $columna
     *
     * @return Sala
     */
    public function setColumna($columna){
        $this->columna = $columna;

        return $this;
    }

    /**
     * Get columna
     *
     * @return integer
     */
    public function getColumna(){
        return $this->columna;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Taquilla
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set total
     *
     * @param integer $total
     *
     * @return Taquilla
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
      * Set boleto
     *
     * @param \SIEBundle\Entity\Boleto $boleto
     *
     * @return Taquilla
     */
    public function setBoleto(\SIEBundle\Entity\Boleto $boleto = null)
    {
        $this->boleto = $boleto;

        return $this;
    }

    /**
     * Get boleto
     *
     * @return \SIEBundle\Entity\Boleto
     */
    public function getBoleto()
    {
        return $this->boleto;
    }

    /**
     * Set hrVta
     *
     * @param \DateTime $hrVta
     *
     * @return Taquilla
     */
    public function setHrVta($hrVta)
    {
        $this->hrVta = $hrVta;

        return $this;
    }

    /**
     * Get hrVta
     *
     * @return \DateTime
     */
    public function getHrVta()
    {
        return $this->hrVta;
    }

    public function __construct(){
        $this->hrVta = new \DateTime('now');
    }
}