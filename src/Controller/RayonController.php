<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Entity\Rayon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RayonController extends AbstractController
{
    /**
     * @Route("/rayon", name="rayon")
     */
    public function list(): Response
    {
        $rayonRepo = $this->getDoctrine()->getRepository(Rayon::class);
        $rayons = $rayonRepo->findAll();

        return $this->render('rayon/liste_rayon.html.twig', [
            "rayons" =>$rayons
        ]);
    }
}
