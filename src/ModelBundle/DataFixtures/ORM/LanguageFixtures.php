<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Language;

class LanguageFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data = [
            ["name"=>"Français", "code" =>"fr"],
            ["name"=>"Anglais", "code" =>"en"],
        ];

        foreach ($data as $item){
            $entity = new Language();
            $entity->setLanguage($item["name"]);
            $manager->persist($entity);
            $this->setReference("language_".$item["code"], $entity);
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
        return 1;
    }
}