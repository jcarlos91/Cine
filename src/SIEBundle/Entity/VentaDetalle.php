<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentaDetalle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\VentaDetalleRepository")
 */
class VentaDetalle
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
     * @var \SIEBundle\Entity\Venta
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Venta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ventaId", referencedColumnName="id")
     *   })
     */
    private $ventaId;

     /**
     * @var \SIEBundle\Entity\Boleto
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Boleto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="boletoId", referencedColumnName="id")
     *   })
     */
    private $boletoId;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ventaId
     *
     * @param \SIEBundle\Entity\Vanta $ventaId
     *
     * @return VentaDetalle
     */
    public function setVentaId(\SIEBundle\Entity\Venta $ventaId = null)
    {
        $this->ventaId = $ventaId;

        return $this;
    }

    /**
     * Get ventaId
     *
     * @return \SIEBundle\Entity\Venta
     */
    public function getVentaId()
    {
        return $this->ventaId;
    }

    /**
     * Set boletoId
     *
     * @param \SIEBundle\Entity\Boleto $boletoId
     *
     * @return VentaDetalle
     */
    public function setBoletoId(\SIEBundle\Entity\Boleto $boletoId)
    {
        $this->boletoId = $boletoId;

        return $this;
    }

    /**
     * Get boletoId
     *
     * @return \SIEBundle\Entity\Boleto
     */
    public function getBoletoId()
    {
        return $this->boletoId;
    }

    /**
     * Set fila
     *
     * @param integer $fila
     *
     * @return VentaDetalle
     */
    public function setfila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get fila
     *
     * @return integer
     */
    public function getfila()
    {
        return $this->fila;
    }

    /**
     * Set columna
     *
     * @param integer $columna
     *
     * @return VentaDetalle
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
}

