<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airports
 *
 * @ORM\Table(name="airports")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AirportsRepository")
 */
class Airports
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
     * @ORM\Column(name="airport_uuid")
     * @Assert\Uuid
     */
    private $airportUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="airport_name", type="string", length=100)
     */
    private $airportName;

    /**
     * @var string
     *
     * @ORM\Column(name="airport_sjort_name", type="string", length=50)
     */
    private $airportSjortName;

    /**
     * @var string
     *
     * @ORM\Column(name="airport_location", type="string", length=100)
     */
    private $airportLocation;


    /**
     * @ORM\OneToMany(targetEntity="AirportGates", mappedBy="airports")
     */
    
    private $airportGates;

    public function __construct()
    {
        $this->airportGates = new ArrayCollection();
    }
    

    public function getAirportGates(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->airportGates;
    }


    public function setAirportGates(\Doctrine\Common\Collections\ArrayCollection $airportGates)
    {
        $this->airportGates = $airportGates;
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
     * Set airportUuid
     *
     * @param integer $airportUuid
     *
     * @return Airports
     */
    public function setAirportUuid($airportUuid)
    {
        $this->airportUuid = $airportUuid;

        return $this;
    }

    /**
     * Get airportUuid
     *
     * @return int
     */
    public function getAirportUuid()
    {
        return $this->airportUuid;
    }

    /**
     * Set airportName
     *
     * @param string $airportName
     *
     * @return Airports
     */
    public function setAirportName($airportName)
    {
        $this->airportName = $airportName;

        return $this;
    }

    /**
     * Get airportName
     *
     * @return string
     */
    public function getAirportName()
    {
        return $this->airportName;
    }

    /**
     * Set airportSjortName
     *
     * @param string $airportSjortName
     *
     * @return Airports
     */
    public function setAirportSjortName($airportSjortName)
    {
        $this->airportSjortName = $airportSjortName;

        return $this;
    }

    /**
     * Get airportSjortName
     *
     * @return string
     */
    public function getAirportSjortName()
    {
        return $this->airportSjortName;
    }

    /**
     * Set airportLocation
     *
     * @param string $airportLocation
     *
     * @return Airports
     */
    public function setAirportLocation($airportLocation)
    {
        $this->airportLocation = $airportLocation;

        return $this;
    }

    /**
     * Get airportLocation
     *
     * @return string
     */
    public function getAirportLocation()
    {
        return $this->airportLocation;
    }
    public function __toString() {

        return $this->airportUuid; 
    
    }
}

