<?php

namespace ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @ORM\Column(name="firstName", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45)
     */
    private $password;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\CustomerCredit", mappedBy="customer")
     */
    private $creditOperations;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\Rental", mappedBy="customer")
     */
    private $rentals;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\CustomerReview", mappedBy="customer")
     */
    private $reviews;

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Customer
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
     * Set name
     *
     * @param string $name
     *
     * @return Customer
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
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creditOperations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rentals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reviews = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creditOperation
     *
     * @param \ModelBundle\Entity\CustomerCredit $creditOperation
     *
     * @return Customer
     */
    public function addCreditOperation(\ModelBundle\Entity\CustomerCredit $creditOperation)
    {
        $this->creditOperations[] = $creditOperation;

        return $this;
    }

    /**
     * Remove creditOperation
     *
     * @param \ModelBundle\Entity\CustomerCredit $creditOperation
     */
    public function removeCreditOperation(\ModelBundle\Entity\CustomerCredit $creditOperation)
    {
        $this->creditOperations->removeElement($creditOperation);
    }

    /**
     * Get creditOperations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreditOperations()
    {
        return $this->creditOperations;
    }

    /**
     * Add rental
     *
     * @param \ModelBundle\Entity\Rental $rental
     *
     * @return Customer
     */
    public function addRental(\ModelBundle\Entity\Rental $rental)
    {
        $this->rentals[] = $rental;

        return $this;
    }

    /**
     * Remove rental
     *
     * @param \ModelBundle\Entity\Rental $rental
     */
    public function removeRental(\ModelBundle\Entity\Rental $rental)
    {
        $this->rentals->removeElement($rental);
    }

    /**
     * Get rentals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRentals()
    {
        return $this->rentals;
    }

    /**
     * Add review
     *
     * @param \ModelBundle\Entity\CustomerReview $review
     *
     * @return Customer
     */
    public function addReview(\ModelBundle\Entity\CustomerReview $review)
    {
        $this->reviews[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \ModelBundle\Entity\CustomerReview $review
     */
    public function removeReview(\ModelBundle\Entity\CustomerReview $review)
    {
        $this->reviews->removeElement($review);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
