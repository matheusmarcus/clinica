<?php

namespace App\Controller;

use App\Entity\Exames;
use App\Form\ExamesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exames")
 */
class ExamesController extends AbstractController
{
    /**
     * @Route("/", name="exames_index", methods={"GET"})
     */
    public function index(): Response
    {
        $exames = $this->getDoctrine()
            ->getRepository(Exames::class)
            ->findAll();

        return $this->render('exames/index.html.twig', [
            'exames' => $exames,
        ]);
    }

    /**
     * @Route("/new", name="exames_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $exame = new Exames();
        $form = $this->createForm(ExamesType::class, $exame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exame);
            $entityManager->flush();

            return $this->redirectToRoute('exames_index');
        }

        return $this->render('exames/new.html.twig', [
            'exame' => $exame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="exames_show", methods={"GET"})
     */
    public function show(Exames $exame): Response
    {
        return $this->render('exames/show.html.twig', [
            'exame' => $exame,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="exames_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Exames $exame): Response
    {
        $form = $this->createForm(ExamesType::class, $exame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exames_index');
        }

        return $this->render('exames/edit.html.twig', [
            'exame' => $exame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="exames_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Exames $exame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exame->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($exame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('exames_index');
    }
}
