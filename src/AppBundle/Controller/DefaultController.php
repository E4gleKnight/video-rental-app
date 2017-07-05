<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * Page d'accueil pour les visiteurs
     * liste de tous les films avec pagination
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'AppBundle:Default:index.html.twig',
            []
        );
    }

    /**
     * Formulaire de recherche de films par
     *  - titre
     *  - acteur
     *  - catégorie
     *  - réalisateur
     *
     * @Route("/recherche" , name="search_page")
     */
    public function searchAction(){
        return $this->render("AppBundle:Default:search.html.twig", []);
    }

    /**
     * Détail d'un film
     *
     * @Route("/details/{id}", name="details_page")
     */
    public function detailsAction(){
        return $this->render("AppBundle:Default:details.html.twig", []);
    }

    /**
     * Inscription d'un client
     * @Route("/inscription", name="register_page")
     */
    public function registerCustomerAction(){
        return $this->render("AppBundle:Default:register.html.twig", []);
    }

    /**
     * Identification des clients
     * @Route("/login", name="customer_login_page")
     */
    public function customerLoginAction(){
        $loginRoute = "customer_login_check";
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render("AppBundle:Default:login.html.twig", [
            "loginRoute" => $loginRoute,
            'lastUserName' => $authenticationUtils->getLastUserName(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * Identification des clients
     * @Route("/login-admin", name="admin_login_page")
     */
    public function AdminLoginAction(){
        $loginRoute = "admin_login_check";
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render("AppBundle:Default:login.html.twig", [
            "loginRoute" => $loginRoute,
            'lastUserName' => $authenticationUtils->getLastUserName(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * Identification des clients
     * @Route("/liste-par-categorie/{id}", name="film-by-category")
     */
    public function byCategoryAction(){
        return $this->render("AppBundle:Default:search-result.html.twig", []);
    }
}
