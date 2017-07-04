<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/press-title")
 */
class PressTitleController extends Controller
{
    /**
     * @Route("/", name="admin_press_title_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:PressTitle:index.html.twig');
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_pressTitle_edit")
     * @Route("/formulaire", name="admin_press-title_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:PressTitle:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_press_title_home");
    }
}
