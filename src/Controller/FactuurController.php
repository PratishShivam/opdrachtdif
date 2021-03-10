<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactuurController extends AbstractController
{
    /**
     * @Route("/factuur", name="factuur")
     */
    public function index(): Response
    {
        return $this->render('factuur/index.html.twig', [
            'controller_name' => 'FactuurController',
        ]);
    }
}
