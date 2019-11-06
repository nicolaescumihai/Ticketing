<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Uuid;



/**
 * PassangerDetails
 *
 * @ORM\Table(name="passanger_details")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PassangerDetailsRepository")
 */
class PassangerDetails 
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
     * @ORM\Column(name="passenger_detail_uuid")
     */
    private $passengerDetailUuid;

    /**
     * @var int
     *
     * @ORM\Column(name="passenger_uuid")
     * 
     */
    private $passengerUuid;

    /**
     * @var int
     *
     * @ORM\Column(name="plane_uuid")
     * @Assert\Uuid
     */
    private $planeUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="plane_seat_uuid")
     * @Assert\Uuid
     */
    private $planeSeatUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=50)
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity="Passengers", inversedBy="PassangerDetails")
     * @ORM\JoinColumn(name="passengers_id", referencedColumnName="id")
     */
    private $passangers;

    public function getPassengers(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->passangers;
    }


    public function setPassengers(\Doctrine\Common\Collections\ArrayCollection $passangers)
    {
        $this->passangers = $passangers;
        return $this;
    }

    /**
     * @ORM\OneToOne(targetEntity="TicketDetails", mappedBy="passangerDetails")
     */
    private $ticketDetails;

    public function getTicketDetails(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->ticketDetails;
    }


    public function setTicketDetails(\Doctrine\Common\Collections\ArrayCollection $ticketDetails)
    {
        $this->ticketDetails = $ticketDetails;
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
     * Set passengerDetailUuid
     *
     * @param integer $passengerDetailUuid
     *
     * @return PassangerDetails
     */
    public function setPassengerDetailUuid($passengerDetailUuid)
    {

        $this->passengerDetailUuid = $passengerDetailUuid;
        return $this;
    
    }

    /**
     * Get passengerDetailUuid
     *
     * @return int
     */
    public function getPassengerDetailUuid()
    {
        return $this->passengerDetailUuid;
    }

    /**
     * Set passengerUuid
     *
     * @param integer $passengerUuid
     *
     * @return PassangerDetails
     */
    public function setPassengerUuid($passengerUuid)
    {
        $this->passengerUuid = $passengerUuid;

        return $this;
    }

    /**
     * Get passengerUuid
     *
     * @return int
     */
    public function getPassengerUuid()
    {
        return $this->passengerUuid;
    }

    /**
     * Set planeUuid
     *
     * @param integer $planeUuid
     *
     * @return PassangerDetails
     */
    public function setPlaneUuid($planeUuid)
    {
        $this->planeUuid = $planeUuid;

        return $this;
    }

    /**
     * Get planeUuid
     *
     * @return int
     */
    public function getPlaneUuid()
    {
        return $this->planeUuid;
    }

    /**
     * Set planeSeatUuid
     *
     * @param string $planeSeatUuid
     *
     * @return PassangerDetails
     */
    public function setPlaneSeatUuid($planeSeatUuid)
    {
        $this->planeSeatUuid = $planeSeatUuid;

        return $this;
    }

    /**
     * Get planeSeatUuid
     *
     * @return string
     */
    public function getPlaneSeatUuid()
    {
        return $this->planeSeatUuid;
    }

    /**
     * Set class
     *
     * @param string $class
     *
     * @return PassangerDetails
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    
}

