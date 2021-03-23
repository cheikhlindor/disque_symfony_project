<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Form\DisqueType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisqueController extends AbstractController
{
    /**
     * @Route("/disque", name="disque")
     */
    public function addDisque(Request $request, EntityManagerInterface $entityManager): Response
    {
        $disque = new Disque();
        $disqueForm = $this->createForm(DisqueType::class, $disque);
        $disqueForm->handleRequest($request);

        if($disqueForm->isSubmitted() && $disqueForm->isValid()){

            $entityManager->persist($disque);
            $entityManager->flush();
            $this->addFlash("success", "Ajout réussi");
            return $this->redirectToRoute('liste_disque', [ ]);

        }
        return $this->render('disque/addDisque.html.twig', [
            'disqueForme' => $disqueForm->createView(),
        ]);
    }

    /**
     * @Route("/disque/list", name="liste_disque")
     */
    public function list( )
    {
        $disqueRepo = $this->getDoctrine()->getRepository(Disque::class);
        $disques = $disqueRepo->findAll();

        return $this->render('disque/liste_disque.html.twig', [
            "disques" =>$disques
        ]);

    }


    /**
     * @Route("/disque/{id}", name="disque_detail",  requirements={"id": "\d+"}, methods={"GET"})
     */
    public function detailDisque($id)
    {
        $disqueRepo = $this->getDoctrine()->getRepository(Disque::class);
        $disque = $disqueRepo->find($id);
        return $this->render('disque/detailDisque.html.twig', [
            "disque"=>$disque
        ]);

    }
}
