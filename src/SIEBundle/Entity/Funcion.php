<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\FuncionRepository")
 */
class Funcion
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
     * @var time
     *
     * @ORM\Column(name="hora", type="time")
     *
     */
    private $hora;

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
     * Set hora
     *
     * @param time $hora
     *
     * @return Funcion
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return time
     */
    public function getHora()
    {
        return $this->hora;
    }

    public function __toString(){

        return (string) $this->hora->format('H:i');
    }
}