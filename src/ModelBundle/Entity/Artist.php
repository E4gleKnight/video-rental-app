<?php

namespace ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artists")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\ArtistRepository")
 */
class Artist
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
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @var Nationality
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Nationality")
     */
    private $nationality;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ModelBundle\Entity\Movie", mappedBy="director")
     */
    private $moviesDirected;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="ModelBundle\Entity\Movie", mappedBy="actors")
     */
    private $moviesActedIn;

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
     * @return Artist
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
     * @return Artist
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
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Artist
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moviesDirected = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moviesActedIn = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nationality
     *
     * @param \ModelBundle\Entity\Nationality $nationality
     *
     * @return Artist
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
     * Add moviesDirected
     *
     * @param \ModelBundle\Entity\Movie $moviesDirected
     *
     * @return Artist
     */
    public function addMoviesDirected(\ModelBundle\Entity\Movie $moviesDirected)
    {
        $this->moviesDirected[] = $moviesDirected;

        return $this;
    }

    /**
     * Remove moviesDirected
     *
     * @param \ModelBundle\Entity\Movie $moviesDirected
     */
    public function removeMoviesDirected(\ModelBundle\Entity\Movie $moviesDirected)
    {
        $this->moviesDirected->removeElement($moviesDirected);
    }

    /**
     * Get moviesDirected
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMoviesDirected()
    {
        return $this->moviesDirected;
    }

    /**
     * Add moviesActedIn
     *
     * @param \ModelBundle\Entity\Movie $moviesActedIn
     *
     * @return Artist
     */
    public function addMoviesActedIn(\ModelBundle\Entity\Movie $moviesActedIn)
    {
        $this->moviesActedIn[] = $moviesActedIn;

        return $this;
    }

    /**
     * Remove moviesActedIn
     *
     * @param \ModelBundle\Entity\Movie $moviesActedIn
     */
    public function removeMoviesActedIn(\ModelBundle\Entity\Movie $moviesActedIn)
    {
        $this->moviesActedIn->removeElement($moviesActedIn);
    }

    /**
     * Get moviesActedIn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMoviesActedIn()
    {
        return $this->moviesActedIn;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Artist
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
}
