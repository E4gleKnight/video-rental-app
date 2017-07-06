<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Language;
use ModelBundle\Entity\PressTitle;

class PressTitleFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data = ["Les cahiers du cinema", "Le Figaro", "Télérama", "Les Inrockuptibles", "Libération"];
        $index = 0;
        foreach ($data as $item){
            $entity = new PressTitle();
            $entity->setName($item);
            $manager->persist($entity);
            $this->setReference("press_++$index", $entity);
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
        return 3;
    }
}