<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Entity\Realisateur;
use App\Form\RealisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisateurController extends AbstractController
{
    /**
     * @Route("/realisateur", name="realisateur")
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $realisateur = new Realisateur();
        $realisateurForm = $this->createForm(RealisateurType::class, $realisateur);
        $realisateurForm->handleRequest($request);

        if($realisateurForm->isSubmitted() && $realisateurForm->isValid()){


            $entityManager->persist($realisateur);
            $entityManager->flush();
            $this->addFlash("success", "Ajout réussi");
            return $this->redirectToRoute('liste_disque', [ ]);
        }

        return $this->render('realisateur/add_realisateur.html.twig', [
            'realisateurForm' => $realisateurForm->createView()
        ]);
    }

    /**
     * @Route("/realisateur/list", name="liste_realisateur")
     */
    public function list()
    {
        $realisateurRepo = $this->getDoctrine()->getRepository(Realisateur::class);
        $realisateurs = $realisateurRepo->findAll();

        return $this->render('  realisateurs/liste_realisateurs.html.twig', [
            "realisateurs" =>  $realisateurs
        ]);

    }


    /**
     * @Route("/realisateur/{id}", name="realisateur_detail",  requirements={"id": "\d+"}, methods={"GET"})
     */
    public function detailRealisateur($id)
    {
        $realisateurRepo = $this->getDoctrine()->getRepository(Realisateur::class);
        $realisateur = $realisateurRepo->find($id);
        return $this->render('realisateur/detailRealisateur.html.twig', [
            "realisateur"=>$realisateur
        ]);

    }
}
