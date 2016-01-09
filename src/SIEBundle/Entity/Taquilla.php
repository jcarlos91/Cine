<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

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

    public function __toString(){
        return (string) $car = $this->cartelera;
    }
}