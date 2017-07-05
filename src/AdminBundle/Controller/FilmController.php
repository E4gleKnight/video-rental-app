<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/film")
 */
class FilmController extends Controller
{
    /**
     * @Route("/", name="admin_film_home")
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository('ModelBundle:Movie');

        $movies = $repo->getAllMovies();

        return $this->render('AdminBundle:Film:index.html.twig', [
            "movies" => $movies
        ]);
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_film_edit")
     * @Route("/formulaire", name="admin_film_new")
     */
    public function formAction(){
        return $this->render('AdminBundle:Film:form.html.twig');
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_language_delete")
     */
    public function deleteAction(){
        return $this->redirectToRoute("admin_film_home");
    }
}
