<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Artist;
use ModelBundle\Entity\Movie;

class MovieFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $index = 0;

        $entity = new Movie();
        $entity
            ->setTitle("Les tontons flingueurs")
            ->setNationality($this->getReference("nationality_fr"))
            ->setCategory($this->getReference("category_com"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(105)
            ->setReleaseDate(new \DateTime("1963-11-27"))
            ->setDirector($this->getReference("artist_lautner"))
            ->addActor($this->getReference("artist_ventura"))
            ->addActor($this->getReference("artist_blier"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Le cave se rebiffe")
            ->setNationality($this->getReference("nationality_fr"))
            ->setCategory($this->getReference("category_com"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(98)
            ->setReleaseDate(new \DateTime("1961-05-05"))
            ->setDirector($this->getReference("artist_grangier"))
            ->addActor($this->getReference("artist_gabin"))
            ->addActor($this->getReference("artist_blier"))
            ->addActor($this->getReference("artist_rosay"))
            ->addActor($this->getReference("artist_carol"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Buffet froid")
            ->setNationality($this->getReference("nationality_fr"))
            ->setCategory($this->getReference("category_com"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(95)
            ->setReleaseDate(new \DateTime("1979-12-19"))
            ->setDirector($this->getReference("artist_blier"))
            ->addActor($this->getReference("artist_depardieu"))
            ->addActor($this->getReference("artist_carmet"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Le bon la brute et le truand")
            ->setNationality($this->getReference("nationality_it"))
            ->setCategory($this->getReference("category_west"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(180)
            ->setReleaseDate(new \DateTime("1968-03-08"))
            ->setDirector($this->getReference("artist_leone"))
            ->addActor($this->getReference("artist_eastwood"))
            ->addActor($this->getReference("artist_vancleef"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Pour une poignée de dollars")
            ->setNationality($this->getReference("nationality_it"))
            ->setCategory($this->getReference("category_west"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(99)
            ->setReleaseDate(new \DateTime("1966-03-01"))
            ->setDirector($this->getReference("artist_leone"))
            ->addActor($this->getReference("artist_eastwood"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Il était une fois dans l'ouest")
            ->setNationality($this->getReference("nationality_it"))
            ->setCategory($this->getReference("category_west"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(180)
            ->setReleaseDate(new \DateTime("1968-03-08"))
            ->setDirector($this->getReference("artist_leone"))
            ->addActor($this->getReference("artist_fonda"))
            ->addActor($this->getReference("artist_bronson"))
            ->addActor($this->getReference("artist_cardinale"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Merci patron")
            ->setNationality($this->getReference("nationality_fr"))
            ->setCategory($this->getReference("category_doc"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(84)
            ->setReleaseDate(new \DateTime("2016-03-24"))
            ->setDirector($this->getReference("artist_ruffin"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("FAHRENHEIT 9/11")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_doc"))
            ->setLanguage($this->getReference("language_en"))
            ->setDuration(110)
            ->setReleaseDate(new \DateTime("2004-07-04"))
            ->setDirector($this->getReference("artist_m_moore"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Bowling for Columbine")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_doc"))
            ->setLanguage($this->getReference("language_en"))
            ->setDuration(120)
            ->setReleaseDate(new \DateTime("2002-10-19"))
            ->setDirector($this->getReference("artist_m_moore"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Sicko")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_doc"))
            ->setLanguage($this->getReference("language_en"))
            ->setDuration(120)
            ->setReleaseDate(new \DateTime("2007-09-05"))
            ->setDirector($this->getReference("artist_m_moore"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Gran Torino")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_thril"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(180)
            ->setReleaseDate(new \DateTime("2009-03-25"))
            ->setDirector($this->getReference("artist_eastwood"))
            ->addActor($this->getReference("artist_eastwood"))
            ->addActor($this->getReference("artist_her"))
            ->addActor($this->getReference("artist_walker"))
            ->addActor($this->getReference("artist_vang"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Mystic River")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_thril"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(110)
            ->setReleaseDate(new \DateTime("2003-10-15"))
            ->setDirector($this->getReference("artist_eastwood"))
            ->addActor($this->getReference("artist_penn"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);

        $entity = new Movie();
        $entity
            ->setTitle("Into the wild")
            ->setNationality($this->getReference("nationality_us"))
            ->setCategory($this->getReference("category_drame"))
            ->setLanguage($this->getReference("language_fr"))
            ->setDuration(110)
            ->setReleaseDate(new \DateTime("2008-01-09"))
            ->setDirector($this->getReference("artist_penn"))
            ->addActor($this->getReference("artist_hirsch"))
        ;
        $manager->persist($entity);
        $this->setReference("movie_". ++$index, $entity);


        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 6;
    }
}