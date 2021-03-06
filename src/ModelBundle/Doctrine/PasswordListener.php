<?php
namespace ModelBundle\Doctrine;


use Doctrine\ORM\Event\LifecycleEventArgs;
use ModelBundle\Entity\Customer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class PasswordListener
{
    /**
     * @var UserPasswordEncoder
     */
    private $encoder;

    /**
     * PasswordListener constructor.
     * @param UserPasswordEncoder $encoder
     */
    public function __construct(UserPasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }


    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        if(! $entity instanceof Customer){
            return;
        }

        $entity->setSalt(sha1(uniqid()));

        $encoded = $this->encoder->encodePassword($entity, $entity->getPlainPassword());
        $entity->setPassword($encoded);
        $entity->setPlainPassword(null);
    }
}