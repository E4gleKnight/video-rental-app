<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Artist;
use ModelBundle\Entity\Customer;
use Faker\Factory;


class CustomerFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        $nbCustomers = 10;

        for($i = 1; $i <=$nbCustomers; $i++){
            $entity = new Customer();
            $entity->setName($faker->lastName)
                ->setFirstName($faker->firstName)
                ->setEmail($faker->email)
                ->setPassword(sha1('123'));
            $manager->persist($entity);
            $this->setReference("cutomer_".$i, $entity);
        }

        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 7;
    }
}