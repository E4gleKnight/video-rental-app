<?php

namespace AppBundle\Controller;

use ModelBundle\Entity\Artist;
use ModelBundle\Entity\Movie;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use ModelBundle\Entity\Customer;
use ModelBundle\Form\CustomerType;
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
        $movieRepo = $this->getDoctrine()->getRepository('ModelBundle:Movie');
        $movieList = $movieRepo->findAll();
        return $this->render(
            'AppBundle:Default:index.html.twig',
            ["movieList"=>$movieList]
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
    public function detailsAction(Movie $movie){

        $movieRepo = $this->getDoctrine()->getRepository('ModelBundle:Movie');

        $moviesList = $movieRepo->getAllMoviesForArtistId($movie);

        $moviesListDirector = $movieRepo->getMoviesByDirector($movie);


        return $this->render("AppBundle:Default:details.html.twig",
            [
                "movie" => $movie,
                "artistList" => $movie->getActors(),
                "moviesList" => $moviesList,
                "director" => $movie->getDirector(),
                "movieslistDirector" => $moviesListDirector

            ]);
    }

    /**
     * Inscription d'un client
     * @Route("/inscription", name="register_page")
     */

    public function registerCustomerAction(Request $request)
    {
        //Instance de l'entité Customer
        $customer = new Customer();
        //Création du formulaire
        $form = $this->createForm(
            CustomerType::class,
            $customer,
            [
                "method" => "post"
            ]
        );
        //Traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();

                $this->addFlash("info", "Votre Inscription a bien été prise en compte.");
                return $this->redirectToRoute("homepage");

            } catch (UniqueConstraintViolationException $ex) {
                $this->addFlash("danger", "Il existe déjà un utilisateur avec cet identifiant");
            }
        }
        //Affichage de la vue avec le formulaire
        return $this->render("AppBundle:Default:register.html.twig",
            ["customerForm" => $form->createView()]);
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
