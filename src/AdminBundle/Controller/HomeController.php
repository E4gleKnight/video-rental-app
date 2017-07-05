<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin")
 */
class HomeController extends Controller
{
    /**
     * Accueil de l'administration
     * @Route("/", name="admin_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Home:index.html.twig');
    }

    /**
     *
     * @Route("/films-en-retard", name="admin_due_films")
     */
    public function showDueFilmsAction(){
        $lateList=$this->getDoctrine()->getRepository("ModelBundle:Rental");
        $lateList->findAll();
        return $this->render('AdminBundle:Home:due-films.html.twig',[
            "lateList"=>$lateList
        ]);
    }




}
