<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RapportenController extends AbstractController
{
    /**
     * @Route("/rapporten", name="rapporten")
     */
    public function index(): Response
    {
        return $this->render('rapporten/index.html.twig', [
            'controller_name' => 'RapportenController',
        ]);
    }
}
