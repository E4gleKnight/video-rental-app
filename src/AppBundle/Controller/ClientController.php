<?php
namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class ClientController
 * @package AppBundle\Controller
 *
 * @Security("has_role('ROLE_CUSTOMER')")
 */
class ClientController extends Controller
{

    /**
     * Compte client, présente l'historique des locations, le solde des points
     * et les films en location
     * @Route("/mon-compte", name="customer_account")
     */
    public function showAccountAction(){

        return $this->render(
            "AppBundle:Customer:account.html.twig",
            []
        );
    }

    /**
     * Location d'un film
     * @Route("/louer/{id}", name="customer_rent")
     */
    public function rentFilmAction($id, Request $request){
        //Redirection vers la page d'origine
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * Location d'un film
     * @Route("/rendre/{id}", name="customer_return")
     */
    public function returnFilmAction($id, Request $request){
        //Redirection vers la page d'origine
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * Critique d'un film
     * @Route("/critique/{id}", name="customer_review")
     */
    public function reviewFilmAction($id, Request $request){

        return $this->redirectToRoute("details_page", ["id" => $id]);
    }
}