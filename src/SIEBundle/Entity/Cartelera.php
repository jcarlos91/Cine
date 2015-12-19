<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartelera
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\CarteleraRepository")
 */
class Cartelera
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
     * @ORM\OneToOne(targetEntity="SIEBundle\Entity\Peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="peliculaId", referencedColumnName="id")
     *   })
     */
    private $peliculaId;

    /**
     * @var \SIEBundle\Entity\Sala
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salaId", referencedColumnName="id")
     *  })
     */
    private $salaId;

     /**
     * @var \SIEBundle\Entity\Funcion
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Funcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionId", referencedColumnName="id")
     *  })
     */
    private $funcionId;

      /**
     * @var \SIEBundle\Entity\Audio
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Audio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="audioId", referencedColumnName="id")
     *  })
     */
    private $audioId;


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
     * Set peliculaId
     *
     * @param SIEBundle\Entity\Peluculas $peliculaId
     *
     * @return Cartelera
     */
    public function setPeliculaId(\SIEBundle\Entity\Peliculas $peliculaId )
    {
        $this->peliculaId = $peliculaId;

        return $this;
    }

    /**
     * Get peliculaId
     *
     * @return SIEBundle\Entity\Peluculas
     */
    public function getPeliculaId()
    {
        return $this->peliculaId;
    }

    /**
     * Set salaId
     *
     * @param SIEBundle\Entity\Sala $salaId
     *
     * @return Cartelera
     */
    public function setSalaId(\SIEBundle\Entity\Sala $salaId = null)
    {
        $this->salaId = $salaId;

        return $this;
    }

    /**
     * Get salaId
     *
     * @return SIEBundle\Entity\Sala
     */
    public function getSalaId()
    {
        return $this->salaId;
    }

    /**
     * Set funcionId
     *
     * @param SIEBundle\Entity\Funcion $funcionId
     *
     * @return Cartelera
     */
    public function setFuncionId(\SIEBundle\Entity\Funcion $funcionId = null)
    {
        $this->funcionId = $funcionId;

        return $this;
    }

    /**
     * Get funcionId
     *
     * @return SIEBundle\Entity\Funcion
     */
    public function getFuncionId()
    {
        return $this->funcionId;
    }

    /**
     * Set audioId
     *
     * @param SIEBundle\Entity\Audio $audioId
     *
     * @return Cartelera
     */
    public function setAudioId(\SIEBundle\Entity\Audio $audioId = null)
    {
        $this->audioId = $audioId;

        return $this;
    }

    /**
     * Get audioId
     *
     * @return SIEBundle\Entity\Audio
     */
    public function getAudioId()
    {
        return $this->audioId;
    }
}

