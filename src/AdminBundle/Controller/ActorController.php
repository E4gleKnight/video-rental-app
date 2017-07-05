<?php

namespace AdminBundle\Controller;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use ModelBundle\Entity\Artist;
use ModelBundle\Form\ArtistType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 * @Route("/admin/actor")
 */
class ActorController extends Controller
{
    /**
     * @Route("/", name="admin_actor_home")
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository('ModelBundle:Artist');

        $artists = $repo->findAll();

        return $this->render('AdminBundle:Actor:index.html.twig', [
            "artists" => $artists
        ]);
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_actor_edit")
     * @Route("/formulaire", name="admin_actor_new")
     */
    public function formAction(Request $request, $id = null){

        $artist = new Artist();

        if ($id != null) {
            $repo = $this->getDoctrine()->getRepository('ModelBundle:Artist');

            $artist = $repo->findOneById($id);
        }

        $form = $this->createForm(
            ArtistType::class,
            $artist,
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
                $em->persist($artist);
                $em->flush();

                // Add flash message
                $this->addFlash('info', 'L\'acteur a bien été ajouté');

                // Redirection to /new-tag route
                return $this->redirectToRoute('admin_actor_home');
            } catch (UniqueConstraintViolationException $ex) {
                // Add flash message
                $this->addFlash('danger', 'Un acteur portant ce nom existe déjà');
            }
        }

        return $this->render('AdminBundle:Actor:form.html.twig', [
            "artistForm" => $form->createView()
        ]);
    }

    /**
     *
     * @Route("/suppression/{id}", name="admin_actor_delete")
     */
    public function deleteAction($id)
    {

        $repo = $this->getDoctrine()->getRepository('ModelBundle:Artist');

        $artist = $repo->findOneById($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artist);
            $em->flush();

            $this->addFlash('info', 'L\'acteur a bien été supprimé');
        } catch (Exception $e) {
            $this->addFlash('danger', 'L\'acteur n\'a pas été supprimé');
        }
        return $this->redirectToRoute("admin_actor_home");
    }
}
