<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\UserRepository")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=100)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var \SIEBundle\Entity\Roles
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Roles")
     * @@RM\JoinColumns({
     *  @ORM\JoinColumn(name="Roles", referencedColumnName="id")    
     * })
     */
    private $roles;

    /**
     * @var \SIEBundle\Entity\Empleado
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado", referencedColumnName="id")
     *  })
     */
    private $empleado;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        //return $this->id;
        $user = $this->get('security.context')->getToken()->getUser();
        $userId = $user->getId();

        return $userId;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        //return $this->salt;
        return sha1($this->getEmail()); 
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return string
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function __construct()
    {
        $this->isActive = true;
        //$this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36); 
        $this->salt = md5(uniqid(null, true));
    }

    /*public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addConstraint(new UniqueEntity(array(
            'fields'  => 'username',
            'message' => 'This username already exists.',
        )));

        $metadata->addPropertyConstraint(new Assert\Username());
    }*/

    /**
     * Set Roles
     *
     * @param \SIEBundle\Entity\Roles $role
     * @return User
     */
    public function setRoles(\SIEBundle\Entity\Roles $roles = null){
        $this->roles = $roles;

        return $this;
    }

    /**
     * GetRoles
     *
     * @return \SIEBundle\Entity\Roles
     */
    public function getRoles()
    {
        if (is_object($this->roles) && $this->roles->getId() === 1) {
            return array('ROLE_ADMIN');
        } else {
            return array('ROLE_USER');
        }
    }
    /**
     * set Empleado
     * 
     * @param \SIEBundle\Entity\Empleado
     * @return User
     */
    public function setEmpleado(\SIEBundle\Entity\Empleado $empleado = null){
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get Empleado
     * 
     * @return \SIEBundle\Entity\Empleado
     */
    public function getEmpleado(){
        return $this->empleado;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }

}