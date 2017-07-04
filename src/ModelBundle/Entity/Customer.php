<?php

namespace ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Customer
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\CustomerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Customer implements \Serializable, UserInterface
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
     * @ORM\Column(name="password", type="string", length=128)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(name="salt", type="string", length=45)
     */
    private $salt;

    /**
     * @var string
     */
    private $plainPassword;

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
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return Customer
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
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



    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(
            [
                $this->id,
                $this->email,
                $this->name
            ]
        );
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->name,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_CUSTOMER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Customer
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }
}
