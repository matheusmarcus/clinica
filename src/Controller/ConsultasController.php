<?php

namespace App\Controller;

use App\Entity\Acesso;
use App\Entity\Consultas;
use App\Form\ConsultasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consultas")
 */
class ConsultasController extends AbstractController
{
    /**
     * @Route("/", name="consultas_index", methods={"GET"})
     */
    public function index(): Response
    {
        $consultas = $this->getDoctrine()
            ->getRepository(Consultas::class)
            ->findAll();

        return $this->render('consultas/index.html.twig', [
            'consultas' => $consultas,
        ]);
    }

    /**
     * @Route("/new", name="consultas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $consulta = new Consultas();
        $form = $this->createForm(ConsultasType::class, $consulta, array(
            'psicologos' => $entityManager->getRepository(Acesso::class)->findBy([
                'perfil' => 2
            ])
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consulta);
            $entityManager->flush();

            return $this->redirectToRoute('consultas_index');
        }

        return $this->render('consultas/new.html.twig', [
            'consulta' => $consulta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultas_show", methods={"GET"})
     */
    public function show(Consultas $consulta): Response
    {
        return $this->render('consultas/show.html.twig', [
            'consulta' => $consulta,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consultas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Consultas $consulta): Response
    {
        $form = $this->createForm(ConsultasType::class, $consulta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consultas_index');
        }

        return $this->render('consultas/edit.html.twig', [
            'consulta' => $consulta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Consultas $consulta): Response
    {
        if ($this->isCsrfTokenValid('delete' . $consulta->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consulta);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consultas_index');
    }
}
