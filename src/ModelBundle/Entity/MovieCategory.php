<?php

namespace ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ModelBundle\Entity\Movie;
use Doctrine\ORM\Mapping as ORM;

/**
 * MovieCategory
 *
 * @ORM\Table(name="movie_categories")
 * @ORM\Entity(repositoryClass="ModelBundle\Repository\MovieCategoryRepository")
 */
class MovieCategory
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
     * @ORM\Column(name="category", type="string", length=80, unique=true)
     */
    private $category;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Movie", mappedBy="category")
     */
    private $movies;


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
     * Set category
     *
     * @param string $category
     *
     * @return MovieCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movie
     *
     * @param \ModelBundle\Entity\Movie $movie
     *
     * @return MovieCategory
     */
    public function addMovie(\ModelBundle\Entity\Movie $movie)
    {
        $this->movies[] = $movie;

        return $this;
    }

    /**
     * Remove movie
     *
     * @param \ModelBundle\Entity\Movie $movie
     */
    public function removeMovie(\ModelBundle\Entity\Movie $movie)
    {
        $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }
}
