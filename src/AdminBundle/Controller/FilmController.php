<?php

namespace AdminBundle\Controller;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use ModelBundle\Entity\Movie;
use ModelBundle\Form\MovieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/film")
 */
class FilmController extends Controller
{
    /**
     * @Route("/index/{page}", name="admin_film_home")
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($page = 1)
    {
        $repo = $this->getDoctrine()->getRepository('ModelBundle:Movie');

        $movies = $repo->getAllMoviesWithPagination($page);

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($movies) / 10),
            'nomRoute' => 'admin_film_home',
            'paramsRoute' => array()
        );

        return $this->render('AdminBundle:Film:index.html.twig', [
            "movies" => $movies,
            "pagination" => $pagination
        ]);
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_film_edit")
     * @Route("/formulaire", name="admin_film_new")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request, $id = null){

        $movie = new Movie();

        if ($id != null) {
            $repo = $this->getDoctrine()->getRepository('ModelBundle:Movie');

            $movie = $repo->findOneById($id);
        }

        $form = $this->createForm(
            MovieType::class,
            $movie,
            [
                "method" => "post"
            ]
        );

        $form->handleRequest($request);

        // Only persist if form is submitted and validation tests are all ok
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Entity persistence
                $em = $this->getDoctrine()->getManager();
                $em->persist($movie);
                $em->flush();

                // Add flash message
                $this->addFlash('info', 'Votre film a bien été ajouté');

                // Redirection to /new-tag route
                return $this->redirectToRoute('admin_film_home');
            } catch (UniqueConstraintViolationException $ex) {
                // Add flash message
                $this->addFlash('danger', 'Un tag portant ce nom existe déjà');
            }
        }

        return $this->render('AdminBundle:Film:form.html.twig', [
            "movieForm" => $form->createView()
        ]);
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_film_delete")
     */
    public function deleteAction($id){

        $repo = $this->getDoctrine()->getRepository('ModelBundle:Movie');

        $movie = $repo->findOneById($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($movie);
            $em->flush();

            $this->addFlash('info', 'Le film a bien été supprimé');
        } catch (Exception $e) {
            $this->addFlash('danger', 'Le film n\'a pas été supprimé');
        }

        return $this->redirectToRoute("admin_film_home");
    }
}
