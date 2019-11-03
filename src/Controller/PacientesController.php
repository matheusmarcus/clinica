<?php

namespace App\Controller;

use App\Entity\Pacientes;
use App\Form\PacientesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pacientes")
 */
class PacientesController extends AbstractController
{
    /**
     * @Route("/", name="pacientes_index", methods={"GET"})
     */
    public function index(): Response
    {
        $pacientes = $this->getDoctrine()
            ->getRepository(Pacientes::class)
            ->findAll();

        return $this->render('pacientes/index.html.twig', [
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * @Route("/new", name="pacientes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paciente = new Pacientes();
        $form = $this->createForm(PacientesType::class, $paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paciente);
            $entityManager->flush();

            return $this->redirectToRoute('pacientes_index');
        }

        return $this->render('pacientes/new.html.twig', [
            'paciente' => $paciente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pacientes_show", methods={"GET"})
     */
    public function show(Pacientes $paciente): Response
    {
        return $this->render('pacientes/show.html.twig', [
            'paciente' => $paciente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pacientes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pacientes $paciente): Response
    {
        $form = $this->createForm(PacientesType::class, $paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pacientes_index');
        }

        return $this->render('pacientes/edit.html.twig', [
            'paciente' => $paciente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pacientes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pacientes $paciente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paciente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paciente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pacientes_index');
    }
}
