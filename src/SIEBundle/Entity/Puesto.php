<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Puesto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\PuestoRepository")
 * @UniqueEntity(fields="puesto", message="Puesto alredy exist")
 */
class Puesto
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
     * @ORM\Column(name="puesto", type="string", length=255, unique=true)
     */
    private $puesto;


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
     * Set puesto
     *
     * @param string $puesto
     *
     * @return Puesto
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }
}

