<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AirportGates
 *
 * @ORM\Table(name="airport_gates")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AirportGatesRepository")
 */
class AirportGates
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
     * @ORM\Column(name="airport_gate_uuid")
     * @Assert\Uuid
     */
    private $airportGateUuid;

    /**
     * @var int
     *
     * @ORM\Column(name="airport_uuid")
     * 
     */
    private $airportUuid;

    /**
     * @var int
     *
     * @ORM\Column(name="airport_gate_no", type="string")
     */
    private $airportGateNo;

    /**
     * @ORM\ManyToOne(targetEntity="Airports", inversedBy="AirportGates")
     * @ORM\JoinColumn(name="airports_id", referencedColumnName="id")
     */
    private $airports;

    public function getAirports(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->airports;
    }


    public function setAirports(\Doctrine\Common\Collections\ArrayCollection $airports)
    {
        $this->airports = $airports;
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
     * Set airportGateUuid
     *
     * @param integer $airportGateUuid
     *
     * @return AirportGates
     */
    public function setAirportGateUuid($airportGateUuid)
    {
        $this->airportGateUuid = $airportGateUuid;

        return $this;
    }

    /**
     * Get airportGateUuid
     *
     * @return int
     */
    public function getAirportGateUuid()
    {
        return $this->airportGateUuid;
    }

    /**
     * Set airportUuid
     *
     * @param integer $airportUuid
     *
     * @return AirportGates
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
     * Set airportGateNo
     *
     * @param integer $airportGateNo
     *
     * @return AirportGates
     */
    public function setAirportGateNo($airportGateNo)
    {
        $this->airportGateNo = $airportGateNo;

        return $this;
    }

    /**
     * Get airportGateNo
     *
     * @return int
     */
    public function getAirportGateNo()
    {
        return $this->airportGateNo;
    }

    public function __toString() {

        return $this->airportGateNo; 
    
    }
}

