<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\AudioRepository")
 */
class Audio
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
     * @ORM\Column(name="audio", type="string", length=255)
     */
    private $audio;


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
     * Set audio
     *
     * @param string $audio
     *
     * @return Audio
     */
    public function setAudio($audio)
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * Get audio
     *
     * @return string
     */
    public function getAudio()
    {
        return $this->audio;
    }

    public function __toString(){
        return (string) $this->audio;
    }
}

