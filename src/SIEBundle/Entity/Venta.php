<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\VentaRepository")
 */
class Venta
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
     * @var \SIEBundle\Entity\Taquilla
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Taquilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taquillaId", referencedColumnName="id")
     *   })
     */
    private $taquillaId;


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
     * Set taquillaId
     *
     * @param \SIEBundle\Entity\Taqyulla $taquillaId
     *
     * @return Venta
     */
    public function setTaquillaId(\SIEBundle\Entity\Taquilla $taquillaId = null)
    {
        $this->taquillaId = $taquillaId;

        return $this;
    }

    /**
     * Get taquillaId
     *
     * @return \SIEbundle\Entity\Taquilla
     */
    public function getTaquillaId()
    {
        return $this->taquillaId;
    }
}

