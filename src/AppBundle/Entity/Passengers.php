<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Passengers
 *
 * @ORM\Table(name="passengers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PassengersRepository")
 */
class Passengers
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
     * @var int
     *
     * @ORM\Column(name="passenger_id")
     * @Assert\Uuid
     */
    private $passengerId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=50)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="id_card", type="string", length=255)
     */
    private $idCard;



    /**
     * @ORM\OneToMany(targetEntity="PassangerDetails", mappedBy="passengers")
     */
    
    private $passangerDetails;

    public function __construct()
    {
        $this->passangerDetails = new ArrayCollection();
    }
    
     

    public function getPassangerDetails(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->passangerDetails;
    }


    public function setPassangerDetails(\Doctrine\Common\Collections\ArrayCollection $passangerDetails)
    {
        $this->passangerDetails = $passangerDetails;
        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set passengerId
     *
     * @param integer $passengerId
     *
     * @return Passengers
     */
    public function setPassengerId($passengerId)
    {
        $this->passengerId = $passengerId;

        return $this;
    }

    /**
     * Get passengerId
     *
     * @return int
     */
    public function getPassengerId()
    {
        return $this->passengerId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Passengers
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Passengers
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Passengers
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set idCard
     *
     * @param string $idCard
     *
     * @return Passengers
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;

        return $this;
    }

    /**
     * Get idCard
     *
     * @return string
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    public function __toString() {

        return $this->firstName; 
    
    }
}

