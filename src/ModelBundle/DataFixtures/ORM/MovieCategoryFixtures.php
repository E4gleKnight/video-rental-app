<?php


namespace ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Language;
use ModelBundle\Entity\MovieCategory;

class MovieCategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $data = [
            ["name"=>"Comédie", "code" =>"com"],
            ["name"=>"Policier", "code" =>"pol"],
            ["name"=>"Science Fiction", "code" =>"sf"],
            ["name"=>"Documentaire", "code" =>"doc"],
            ["name"=>"Série", "code" =>"ser"],
            ["name"=>"Western", "code" =>"west"],
            ["name"=>"Thriller", "code" =>"thril"],
            ["name"=>"Drame", "code" =>"drame"]

        ];

        foreach ($data as $item){
            $entity = new MovieCategory();
            $entity->setCategory($item["name"]);
            $manager->persist($entity);
            $this->setReference("category_".$item["code"], $entity);
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
        return 4;
    }
}