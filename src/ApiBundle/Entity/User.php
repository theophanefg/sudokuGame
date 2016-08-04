<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="winNumber", type="integer")
     */
    private $winNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="lossNumber", type="integer")
     */
    private $lossNumber;


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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set winNumber
     *
     * @param integer $winNumber
     * @return User
     */
    public function setWinNumber($winNumber)
    {
        $this->winNumber = $winNumber;

        return $this;
    }

    /**
     * Get winNumber
     *
     * @return integer 
     */
    public function getWinNumber()
    {
        return $this->winNumber;
    }

    /**
     * Set lossNumber
     *
     * @param integer $lossNumber
     * @return User
     */
    public function setLossNumber($lossNumber)
    {
        $this->lossNumber = $lossNumber;

        return $this;
    }

    /**
     * Get lossNumber
     *
     * @return integer 
     */
    public function getLossNumber()
    {
        return $this->lossNumber;
    }
}
