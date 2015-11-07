<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dulceria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\DulceriaRepository")
 */
class Dulceria
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
     * @var \SIEBundle\Entity\Productos
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Productos" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nombre", referencedColumnName="id")
     *   })
     */
    private $producto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="subtotal", type="integer")
     */
    private $subtotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="vendedor", type="integer")
     */
    private $vendedor;


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
     * Set producto
     *
     * @param \SIEBundle\Entity\Producto $producto
     *
     * @return Dulceria
     */
    public function setProducto(\SIEBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \SIEBundle\Entity\Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Dulceria
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
     * Set subtotal
     *
     * @param integer $subtotal
     *
     * @return Dulceria
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return integer
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set total
     *
     * @param integer $total
     *
     * @return Dulceria
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
     * Set vendedor
     *
     * @param integer $vendedor
     *
     * @return Dulceria
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
}

