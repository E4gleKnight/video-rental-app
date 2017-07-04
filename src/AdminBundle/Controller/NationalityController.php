<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/nationality")
 */
class NationalityController extends Controller
{
    /**
     * @Route("/", name="admin_nationality_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Nationality:index.html.twig');
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_nationality_edit")
     * @Route("/formulaire", name="admin_nationality_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:Nationality:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_nationality_home");
    }
}
