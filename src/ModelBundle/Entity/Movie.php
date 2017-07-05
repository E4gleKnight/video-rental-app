<?php

namespace ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\MovieRepository")
 */
class Movie
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
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="date")
     */
    private $releaseDate;

    /**
     * @var \ModelBundle\Entity\Language
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Language")
     */
    private $language;

    /**
     * @var Nationality
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Nationality")
     */
    private $nationality;

    /**
     * @var MovieCategory
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\MovieCategory", inversedBy="movies")
     */
    private $category;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Artist", inversedBy="moviesDirected")
     */
    private $director;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="ModelBundle\Entity\Artist", inversedBy="moviesActedIn")
     */
    private $actors;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\Rental", mappedBy="movie")
     */
    private $rentals;

    /**
     * @var CustomerReview
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\CustomerReview", mappedBy="movie")
     */
    private $customerReviews;

    /**
     * @var PressReview
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\PressReview", mappedBy="movie")
     */
    private $pressReviews;


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
     * Set title
     *
     * @param string $title
     *
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Movie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Movie
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rentals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set language
     *
     * @param \ModelBundle\Entity\Language $language
     *
     * @return Movie
     */
    public function setLanguage(\ModelBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \ModelBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set nationality
     *
     * @param \ModelBundle\Entity\Nationality $nationality
     *
     * @return Movie
     */
    public function setNationality(\ModelBundle\Entity\Nationality $nationality = null)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return \ModelBundle\Entity\Nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set category
     *
     * @param \ModelBundle\Entity\MovieCategory $category
     *
     * @return Movie
     */
    public function setCategory(\ModelBundle\Entity\MovieCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ModelBundle\Entity\MovieCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set director
     *
     * @param \ModelBundle\Entity\Artist $director
     *
     * @return Movie
     */
    public function setDirector(\ModelBundle\Entity\Artist $director = null)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return \ModelBundle\Entity\Artist
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Add actor
     *
     * @param \ModelBundle\Entity\Artist $actor
     *
     * @return Movie
     */
    public function addActor(\ModelBundle\Entity\Artist $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \ModelBundle\Entity\Artist $actor
     */
    public function removeActor(\ModelBundle\Entity\Artist $actor)
    {
        $this->actors->removeElement($actor);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add rental
     *
     * @param \ModelBundle\Entity\Rental $rental
     *
     * @return Movie
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
     * Add customerReview
     *
     * @param \ModelBundle\Entity\CustomerReview $customerReview
     *
     * @return Movie
     */
    public function addCustomerReview(\ModelBundle\Entity\CustomerReview $customerReview)
    {
        $this->customerReviews[] = $customerReview;

        return $this;
    }

    /**
     * Remove customerReview
     *
     * @param \ModelBundle\Entity\CustomerReview $customerReview
     */
    public function removeCustomerReview(\ModelBundle\Entity\CustomerReview $customerReview)
    {
        $this->customerReviews->removeElement($customerReview);
    }

    /**
     * Get customerReviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerReviews()
    {
        return $this->customerReviews;
    }

    /**
     * Add pressReview
     *
     * @param \ModelBundle\Entity\PressReview $pressReview
     *
     * @return Movie
     */
    public function addPressReview(\ModelBundle\Entity\PressReview $pressReview)
    {
        $this->pressReviews[] = $pressReview;

        return $this;
    }

    /**
     * Remove pressReview
     *
     * @param \ModelBundle\Entity\PressReview $pressReview
     */
    public function removePressReview(\ModelBundle\Entity\PressReview $pressReview)
    {
        $this->pressReviews->removeElement($pressReview);
    }

    /**
     * Get pressReviews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPressReviews()
    {
        return $this->pressReviews;
    }
}
