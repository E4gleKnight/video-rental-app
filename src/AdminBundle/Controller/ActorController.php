<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/actor")
 */
class ActorController extends Controller
{
    /**
     * @Route("/", name="admin_actor_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Actor:index.html.twig');
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_actor_edit")
     * @Route("/formulaire", name="admin_actor_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:Actor:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_actor_home");
    }
}
