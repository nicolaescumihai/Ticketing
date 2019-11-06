<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Planes
 *
 * @ORM\Table(name="planes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlanesRepository")
 */
class Planes
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
     * @ORM\Column(name="plane_uuid")
     * @Assert\Uuid
     */
    private $planeUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=50)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="plane_type", type="string", length=50)
     */
    private $planeType;

    /**
     * @var int
     *
     * @ORM\Column(name="plane_no", type="string")
     */
    private $planeNo;

    /**
     * @ORM\OneToMany(targetEntity="PlaneSeats", mappedBy="planes")
     */
    
    private $planeSeats;

    public function __construct()
    {
        $this->planeSeats = new ArrayCollection();
    }
    

    public function getPlaneSeats(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->planeSeats;
    }


    public function setPlaneSeats(\Doctrine\Common\Collections\ArrayCollection $planeSeats)
    {
        $this->planeSeats = $planeSeats;
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
     * Set planeUuid
     *
     * @param integer $planeUuid
     *
     * @return Planes
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
     * Set company
     *
     * @param string $company
     *
     * @return Planes
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set planeType
     *
     * @param string $planeType
     *
     * @return Planes
     */
    public function setPlaneType($planeType)
    {
        $this->planeType = $planeType;

        return $this;
    }

    /**
     * Get planeType
     *
     * @return string
     */
    public function getPlaneType()
    {
        return $this->planeType;
    }

    /**
     * Set planeNo
     *
     * @param integer $planeNo
     *
     * @return Planes
     */
    public function setPlaneNo($planeNo)
    {
        $this->planeNo = $planeNo;

        return $this;
    }

    /**
     * Get planeNo
     *
     * @return int
     */
    public function getPlaneNo()
    {
        return $this->planeNo;
    }

    public function __toString() {

        return $this->planeUuid; 
    
    }

}

