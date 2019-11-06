<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PlaneSeats
 *
 * @ORM\Table(name="plane_seats")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaneSeatsRepository")
 */
class PlaneSeats
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
     * @ORM\Column(name="plane_seat_uuid")
     * @Assert\Uuid
     */
    private $planeSeatUuid;

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
     * @ORM\Column(name="plane_seat_name", type="string", length=50)
     */
    private $planeSeatName;

    /**
     * @var string
     *
     * @ORM\Column(name="plane_seat_status")
     */
    private $planeSeatStatus;

    /**
     * @ORM\ManyToOne(targetEntity="Planes", inversedBy="PlaneSeats")
     * @ORM\JoinColumn(name="planes_id", referencedColumnName="id")
     */
    private $planes;

    public function getPlanes(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->planes;
    }


    public function setPlanes(\Doctrine\Common\Collections\ArrayCollection $planes)
    {
        $this->planes = $planes;
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
     * Set planeSeatUuid
     *
     * @param string $planeSeatUuid
     *
     * @return PlaneSeats
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
     * Set planeUuid
     *
     * @param integer $planeUuid
     *
     * @return PlaneSeats
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
     * Set planeSeatName
     *
     * @param string $planeSeatName
     *
     * @return PlaneSeats
     */
    public function setPlaneSeatName($planeSeatName)
    {
        $this->planeSeatName = $planeSeatName;

        return $this;
    }

    /**
     * Get planeSeatName
     *
     * @return string
     */
    public function getPlaneSeatName()
    {
        return $this->planeSeatName;
    }

    /**
     * Set planeSeatStatus
     *
     * @param string $planeSeatStatus
     *
     * @return PlaneSeats
     */
    public function setPlaneSeatStatus($planeSeatStatus)
    {
        $this->planeSeatStatus = $planeSeatStatus;

        return $this;
    }

    /**
     * Get planeSeatStatus
     *
     * @return string
     */
    public function getPlaneSeatStatus()
    {
        return $this->planeSeatStatus;
    }

    public function __toString() {

        return $this->planeSeatUuid; 
    
    }
}

