<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/language")
 */
class LanguageController extends Controller
{
    /**
     * @Route("/", name="admin_language_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Language:index.html.twig');
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_language_edit")
     * @Route("/formulaire", name="admin_language_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:Language:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_language_home");
    }
}
