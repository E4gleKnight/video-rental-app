<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Nationality;

class NationalityFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data = [
            ["name"=>"Française", "code" =>"fr"],
            ["name"=>"Anglaise", "code" =>"en"],
            ["name"=>"Américaine", "code" =>"us"],
            ["name"=>"Espagnole", "code" =>"es"],
            ["name"=>"Italienne", "code" =>"it"],
        ];

        foreach ($data as $item){
            $entity = new Nationality();
            $entity->setNationality($item["name"]);
            $manager->persist($entity);
            $this->setReference("nationality_".$item["code"], $entity);
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
        return 2;
    }
}