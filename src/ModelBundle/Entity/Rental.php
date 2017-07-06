<?php

namespace ModelBundle\Entity;

use Doctrine\DBAL\Types\BooleanType;
use Doctrine\ORM\Mapping as ORM;
use ModelBundle\Entity\Customer;
use ModelBundle\Entity\Movie;

/**
 * Rental
 *
 * @ORM\Table(name="rentals")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\rentalRepository")
 */
class Rental
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
     * @var \DateTime
     *
     * @ORM\Column(name="rentedAt", type="date")
     */
    private $rentedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date")
     */
    private $dueDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="returnedAt", type="date", nullable=true)
     */
    private $returnedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="fineAmount", type="integer", nullable=true)
     */
    private $fineAmount;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="rentals")
     *
     */
    private $customer;

    /**
     * @var Movie
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="rentals")
     */
    private $movie;


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
     * Set rentedAt
     *
     * @param \DateTime $rentedAt
     *
     * @return Rental
     */
    public function setRentedAt($rentedAt)
    {
        $this->rentedAt = $rentedAt;

        return $this;
    }

    /**
     * Get rentedAt
     *
     * @return \DateTime
     */
    public function getRentedAt()
    {
        return $this->rentedAt;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     *
     * @return Rental
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set returnedAt
     *
     * @param \DateTime $returnedAt
     *
     * @return Rental
     */
    public function setReturnedAt($returnedAt)
    {
        $this->returnedAt = $returnedAt;

        return $this;
    }

    /**
     * Get returnedAt
     *
     * @return \DateTime
     */
    public function getReturnedAt()
    {
        return $this->returnedAt;
    }

    /**
     * Set fineAmount
     *
     * @param integer $fineAmount
     *
     * @return Rental
     */
    public function setFineAmount($fineAmount)
    {
        $this->fineAmount = $fineAmount;

        return $this;
    }

    /**
     * Get fineAmount
     *
     * @return int
     */
    public function getFineAmount()
    {
        return $this->fineAmount;
    }

    /**
     * Set customer
     *
     * @param \ModelBundle\Entity\Customer $customer
     *
     * @return Rental
     */
    public function setCustomer(\ModelBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \ModelBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set movie
     *
     * @param \ModelBundle\Entity\Movie $movie
     *
     * @return Rental
     */
    public function setMovie(\ModelBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \ModelBundle\Entity\Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     *
     * @return bool
     */
    public function isLate(){
        return $this->dueDate < new \DateTime('today');
    }
}
