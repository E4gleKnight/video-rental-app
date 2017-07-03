<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Artist;

class ArtistFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $entity = new Artist();
        $entity->setName("Ventura")
            ->setFirstName("Lino")
            ->setBirthDate(new \DateTime("1919-07-14"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_ventura", $entity);

        $entity = new Artist();
        $entity->setName("Gabin")
            ->setFirstName("Jean")
            ->setBirthDate(new \DateTime("1904-05-17"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_gabin", $entity);

        $entity = new Artist();
        $entity->setName("Blier")
            ->setFirstName("Bernard")
            ->setBirthDate(new \DateTime("1916-01-11"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_blier", $entity);

        $entity = new Artist();
        $entity->setName("Morgan")
            ->setFirstName("Michèle")
            ->setBirthDate(new \DateTime("1920-02-29"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_morgan", $entity);

        $entity = new Artist();
        $entity->setName("Lautner")
            ->setFirstName("Georges")
            ->setBirthDate(new \DateTime("1926-01-24"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_lautner", $entity);

        $entity = new Artist();
        $entity->setName("Grangier")
            ->setFirstName("Gilles")
            ->setBirthDate(new \DateTime("1911-05-05"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_grangier", $entity);

        $entity = new Artist();
        $entity->setName("Rosay")
            ->setFirstName("Françoise")
            ->setBirthDate(new \DateTime("1891-04-19"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_rosay", $entity);

        $entity = new Artist();
        $entity->setName("Carol")
            ->setFirstName("Martine")
            ->setBirthDate(new \DateTime("1920-05-16"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_carol", $entity);

        $entity = new Artist();
        $entity->setName("Depardieu")
            ->setFirstName("Gérard")
            ->setBirthDate(new \DateTime("1948-12-27"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_depardieu", $entity);

        $entity = new Artist();
        $entity->setName("Carmet")
            ->setFirstName("Jean")
            ->setBirthDate(new \DateTime("1920-04-25"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_carmet", $entity);

        $entity = new Artist();
        $entity->setName("Leone")
            ->setFirstName("Sergio")
            ->setBirthDate(new \DateTime("1921-01-03"))
            ->setNationality($this->getReference("nationality_it"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_leone", $entity);

        $entity = new Artist();
        $entity->setName("Eastwood")
            ->setFirstName("Clint")
            ->setBirthDate(new \DateTime("1930-05-31"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_eastwood", $entity);

        $entity = new Artist();
        $entity->setName("Van Cleef")
            ->setFirstName("Lee")
            ->setBirthDate(new \DateTime("1925-01-09"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_vancleef", $entity);

        $entity = new Artist();
        $entity->setName("Bronson")
            ->setFirstName("Charles")
            ->setBirthDate(new \DateTime("1921-11-03"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_bronson", $entity);

        $entity = new Artist();
        $entity->setName("Fonda")
            ->setFirstName("Henri")
            ->setBirthDate(new \DateTime("1905-05-16"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_fonda", $entity);

        $entity = new Artist();
        $entity->setName("Cardinale")
            ->setFirstName("Claudia")
            ->setBirthDate(new \DateTime("1938-04-15"))
            ->setNationality($this->getReference("nationality_it"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_cardinale", $entity);

        $entity = new Artist();
        $entity->setName("Ruffin")
            ->setFirstName("François")
            ->setBirthDate(new \DateTime("1975-10-18"))
            ->setNationality($this->getReference("nationality_fr"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_ruffin", $entity);

        $entity = new Artist();
        $entity->setName("Moore")
            ->setFirstName("Michael")
            ->setBirthDate(new \DateTime("1954-04-24"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_m_moore", $entity);

        $entity = new Artist();
        $entity->setName("Walker")
            ->setFirstName("Dreama")
            ->setBirthDate(new \DateTime("1986-06-20"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_walker", $entity);

        $entity = new Artist();
        $entity->setName("Vang")
            ->setFirstName("Bee")
            ->setBirthDate(new \DateTime("1991-11-04"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_vang", $entity);

        $entity = new Artist();
        $entity->setName("Her")
            ->setFirstName("Ahney")
            ->setBirthDate(new \DateTime("1993-07-13"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("F");
        $manager->persist($entity);
        $this->setReference("artist_her", $entity);

        $entity = new Artist();
        $entity->setName("Penn")
            ->setFirstName("Sean")
            ->setBirthDate(new \DateTime("1960-08-17"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_penn", $entity);

        $entity = new Artist();
        $entity->setName("Hirsch")
            ->setFirstName("Emile")
            ->setBirthDate(new \DateTime("1985-03-13"))
            ->setNationality($this->getReference("nationality_us"))
            ->setGender("M");
        $manager->persist($entity);
        $this->setReference("artist_hirsch", $entity);





        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }
}