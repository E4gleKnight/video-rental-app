<?php

namespace ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ModelBundle\Entity\PressTitle;

/**
 * PressReview
 *
 * @ORM\Table(name="press_reviews")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\PressReviewRepository")
 */
class PressReview
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
     * @var PressTitle
     * @ORM\ManyToOne(targetEntity="PressTitle")
     */
    private $pressTitle;


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
     * @return PressReview
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
     * @return PressReview
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
     * @return PressReview
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
     * Set pressTitle
     *
     * @param \ModelBundle\Entity\PressTitle $pressTitle
     *
     * @return PressReview
     */
    public function setPressTitle(\ModelBundle\Entity\PressTitle $pressTitle = null)
    {
        $this->pressTitle = $pressTitle;

        return $this;
    }

    /**
     * Get pressTitle
     *
     * @return \ModelBundle\Entity\PressTitle
     */
    public function getPressTitle()
    {
        return $this->pressTitle;
    }
}
