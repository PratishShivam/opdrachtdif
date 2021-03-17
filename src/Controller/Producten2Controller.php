<?php

namespace App\Controller;

use App\Entity\Producten2;
use App\Form\Producten2Type;
use App\Repository\Producten2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producten2")
 */
class Producten2Controller extends AbstractController
{
    /**
     * @Route("/", name="producten2_index", methods={"GET"})
     */
    public function index(Producten2Repository $producten2Repository): Response
    {
        return $this->render('producten2/index.html.twig', [
            'producten2s' => $producten2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="producten2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $producten2 = new Producten2();
        $form = $this->createForm(Producten2Type::class, $producten2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producten2);
            $entityManager->flush();

            return $this->redirectToRoute('producten2_index');
        }

        return $this->render('producten2/new.html.twig', [
            'producten2' => $producten2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producten2_show", methods={"GET"})
     */
    public function show(Producten2 $producten2): Response
    {
        return $this->render('producten2/show.html.twig', [
            'producten2' => $producten2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="producten2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Producten2 $producten2): Response
    {
        $form = $this->createForm(Producten2Type::class, $producten2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producten2_index');
        }

        return $this->render('producten2/edit.html.twig', [
            'producten2' => $producten2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producten2_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Producten2 $producten2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producten2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($producten2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('producten2_index');
    }
}
