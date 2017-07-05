<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 05/07/2017
 * Time: 14:03
 */

namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Rental;

class RentalFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager){

        $index=1;

        $entity=new Rental();
        $entity->setCustomer($this->getReference('cutomer_1'))
            ->setMovie($this->getReference('movie_1'))
            ->setRentedAt(new \DateTime('today - 2 day'))
            ->setDueDate(new \DateTime('today + 1 day'))
            ->setReturnedAt(null)
            ->setFineAmount(0);
        $manager->persist($entity);
        $this->setReference('renta_'. ++$index, $entity);

        $entity=new Rental();
        $entity->setCustomer($this->getReference('cutomer_3'))
            ->setMovie($this->getReference('movie_2'))
            ->setRentedAt(new \DateTime('today - 3 day'))
            ->setDueDate(new \DateTime('today '))
            ->setReturnedAt(null)
            ->setFineAmount(0);
        $manager->persist($entity);
        $this->setReference('renta_'. ++$index, $entity);

        $entity=new Rental();
        $entity->setCustomer($this->getReference('cutomer_5'))
            ->setMovie($this->getReference('movie_7'))
            ->setRentedAt(new \DateTime('today - 4 day'))
            ->setDueDate(new \DateTime('today - 1 day'))
            ->setReturnedAt(null)
            ->setFineAmount(0);
        $manager->persist($entity);
        $this->setReference('renta_'. ++$index, $entity);

        $entity=new Rental();
        $entity->setCustomer($this->getReference('cutomer_1'))
            ->setMovie($this->getReference('movie_4'))
            ->setRentedAt(new \DateTime('today - 5day'))
            ->setDueDate(new \DateTime('today -2day'))
            ->setReturnedAt(null)
            ->setFineAmount(0);
        $manager->persist($entity);
        $this->setReference('renta_'. ++$index, $entity);

        $manager->flush();

    }
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 8;
    }
}