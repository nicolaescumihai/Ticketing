<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TicketDetails
 *
 * @ORM\Table(name="ticket_details")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketDetailsRepository")
 */
class TicketDetails
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
     * @ORM\Column(name="ticket_detail_uuid")
     * @Assert\Uuid
     */
    private $ticketDetailUuid;

    /**
     * @var int
     *
     * @ORM\Column(name="ticket_uuid")
     * @Assert\Uuid
     */
    private $ticketUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="from_airport_uuid")
     * @Assert\Uuid
     */
    private $fromAirportUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="to_airport_uuid")
     * @Assert\Uuid
     */
    private $toAirportUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="passanger_detail_uuid")
     * @Assert\Uuid
     */
    private $passangerDetailUuid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="boarding_date", type="date")
     */
    private $boardingDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="boarding_time", type="time")
     */
    private $boardingTime;

    /**
     * @var int
     *
     * @ORM\Column(name="airport_gate_uuid")
     * @Assert\Uuid
     */
    private $airportGateUuid;

    /**
     * @ORM\ManyToOne(targetEntity="Tickets", inversedBy="TicketDetails")
     * @ORM\JoinColumn(name="tickets_id", referencedColumnName="id")
     */
    private $tickets;

    public function getTickets(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->tickets;
    }


    public function setTickets(\Doctrine\Common\Collections\ArrayCollection $tickets)
    {
        $this->tickets = $tickets;
        return $this;
    }

    /**
     * @ORM\OneToOne(targetEntity="PassangerDetails", inversedBy="ticketDetails")
     */
    private $passangerDetails;

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
     * Set ticketDetailUuid
     *
     * @param integer $ticketDetailUuid
     *
     * @return TicketDetails
     */
    public function setTicketDetailUuid($ticketDetailUuid)
    {
        $this->ticketDetailUuid = $ticketDetailUuid;

        return $this;
    }

    /**
     * Get ticketDetailUuid
     *
     * @return int
     */
    public function getTicketDetailUuid()
    {
        return $this->ticketDetailUuid;
    }

    /**
     * Set ticketUuid
     *
     * @param integer $ticketUuid
     *
     * @return TicketDetails
     */
    public function setTicketUuid($ticketUuid)
    {
        $this->ticketUuid = $ticketUuid;

        return $this;
    }

    /**
     * Get ticketUuid
     *
     * @return int
     */
    public function getTicketUuid()
    {
        return $this->ticketUuid;
    }

    /**
     * Set fromAirportUuid
     *
     * @param string $fromAirportUuid
     *
     * @return TicketDetails
     */
    public function setFromAirportUuid($fromAirportUuid)
    {
        $this->fromAirportUuid = $fromAirportUuid;

        return $this;
    }

    /**
     * Get fromAirportUuid
     *
     * @return string
     */
    public function getFromAirportUuid()
    {
        return $this->fromAirportUuid;
    }

    /**
     * Set toAirportUuid
     *
     * @param string $toAirportUuid
     *
     * @return TicketDetails
     */
    public function setToAirportUuid($toAirportUuid)
    {
        $this->toAirportUuid = $toAirportUuid;

        return $this;
    }

    /**
     * Get toAirportUuid
     *
     * @return string
     */
    public function getToAirportUuid()
    {
        return $this->toAirportUuid;
    }

    /**
     * Set passangerDetailUuid
     *
     * @param string $passangerDetailUuid
     *
     * @return TicketDetails
     */
    public function setPassangerDetailUuid($passangerDetailUuid)
    {
        $this->passangerDetailUuid = $passangerDetailUuid;

        return $this;
    }

    /**
     * Get passangerDetailUuid
     *
     * @return string
     */
    public function getPassangerDetailUuid()
    {
        return $this->passangerDetailUuid;
    }

    /**
     * Set boardingDate
     *
     * @param \DateTime $boardingDate
     *
     * @return TicketDetails
     */
    public function setBoardingDate($boardingDate)
    {
        $this->boardingDate = $boardingDate;

        return $this;
    }

    /**
     * Get boardingDate
     *
     * @return \DateTime
     */
    public function getBoardingDate()
    {
        return $this->boardingDate;
    }

    /**
     * Set boardingTime
     *
     * @param \DateTime $boardingTime
     *
     * @return TicketDetails
     */
    public function setBoardingTime($boardingTime)
    {
        $this->boardingTime = $boardingTime;

        return $this;
    }

    /**
     * Get boardingTime
     *
     * @return \DateTime
     */
    public function getBoardingTime()
    {
        return $this->boardingTime;
    }

    /**
     * Set airportGateUuid
     *
     * @param integer $airportGateUuid
     *
     * @return TicketDetails
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
}

