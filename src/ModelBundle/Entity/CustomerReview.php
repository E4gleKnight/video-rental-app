<?php

namespace ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerReview
 *
 * @ORM\Table(name="customer_reviews")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\CustomerReviewRepository")
 */
class CustomerReview
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
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="review", type="text")
     */
    private $review;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Customer", inversedBy="reviews")
     */
    private $customer;

    /**
     * @var Movie
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Movie", inversedBy="customerReviews")
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
     * Set rating
     *
     * @param integer $rating
     *
     * @return CustomerReview
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set review
     *
     * @param string $review
     *
     * @return CustomerReview
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CustomerReview
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set customer
     *
     * @param \ModelBundle\Entity\Customer $customer
     *
     * @return CustomerReview
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
     * @return CustomerReview
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
}
