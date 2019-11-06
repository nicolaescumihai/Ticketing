<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketsRepository")
 */
class Tickets
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
     * @ORM\Column(name="ticket_uuid")
     * @Assert\Uuid
     */
    private $ticketUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_type")
     */
    private $ticketType;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_status")
     */
    private $ticketStatus;

    

    /**
     * @ORM\OneToMany(targetEntity="TicketDetails", mappedBy="tickets")
     */
    
    private $ticketDetails;

    public function __construct()
    {
        $this->ticketDetails = new ArrayCollection();
    }
    

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
     * Set ticketUuid
     *
     * @param integer $ticketUuid
     *
     * @return Tickets
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
     * Set ticketType
     *
     * @param string $ticketType
     *
     * @return Tickets
     */
    public function setTicketType($ticketType)
    {
        $this->ticketType = $ticketType;

        return $this;
    }

    /**
     * Get ticketType
     *
     * @return string
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * Set ticketStatus
     *
     * @param string $ticketStatus
     *
     * @return Tickets
     */
    public function setTicketStatus($ticketStatus)
    {
        $this->ticketStatus = $ticketStatus;

        return $this;
    }

    /**
     * Get ticketStatus
     *
     * @return string
     */
    public function getTicketStatus()
    {
        return $this->ticketStatus;
    }

    public function __toString() {

        return $this->ticketStatus;
    }
}

