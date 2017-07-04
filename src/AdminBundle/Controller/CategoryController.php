<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/category")
 */
class CategoryController extends Controller
{
    /**
     * @Route("/", name="admin_category_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Category:index.html.twig');
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_category_edit")
     * @Route("/formulaire", name="admin_category_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:Category:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_category_home");
    }
}
