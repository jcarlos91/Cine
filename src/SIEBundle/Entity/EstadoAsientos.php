<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SYmfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * EstadoAsientos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\EstadoAsientosRepository")
 * @UniqueEntity(fields="estado", message="Estado alrady exist")
 */
class EstadoAsientos
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
     * @ORM\Column(name="estado", type="string", length=255, unique=true)
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
     * Set estado
     *
     * @param string $estado
     *
     * @return EstadoAsientos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

