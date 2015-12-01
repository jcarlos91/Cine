<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Boleto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\BoletoRepository")
 * @UniqueEntity(fields="tipoBoleto", message="Tipo boleto already exist")
 * 
 */
class Boleto
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
     * @ORM\Column(name="tipoBoleto", type="string", length=255, unique=true)
     */
    private $tipoBoleto;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;


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
     * Set tipoBoleto
     *
     * @param string $tipoBoleto
     *
     * @return Boleto
     */
    public function setTipoBoleto($tipoBoleto)
    {
        $this->tipoBoleto = $tipoBoleto;

        return $this;
    }

    /**
     * Get tipoBoleto
     *
     * @return string
     */
    public function getTipoBoleto()
    {
        return $this->tipoBoleto;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Boleto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}

