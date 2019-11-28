<?php

namespace App\Controller;

use App\Entity\Acesso;
use App\Form\AcessoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/acesso")
 */
class AcessoController extends AbstractController
{
    /**
     * @Route("/", name="acesso_index", methods={"GET"})
     */
    public function index(): Response
    {
        $acessos = $this->getDoctrine()
            ->getRepository(Acesso::class)
            ->findAll();

        return $this->render('acesso/index.html.twig', [
            'acessos' => $acessos,
        ]);
    }

    /**
     * @Route("/new", name="acesso_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $acesso = new Acesso();
        $form = $this->createForm(AcessoType::class, $acesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $acesso->setPassword(sha1(md5($acesso->getPassword())));
            $entityManager->persist($acesso);
            $entityManager->flush();

            return $this->redirectToRoute('acesso_index');
        }

        return $this->render('acesso/new.html.twig', [
            'acesso' => $acesso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="acesso_show", methods={"GET"})
     */
    public function show(Acesso $acesso): Response
    {
        return $this->render('acesso/show.html.twig', [
            'acesso' => $acesso,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="acesso_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Acesso $acesso): Response
    {
        $form = $this->createForm(AcessoType::class, $acesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acesso->setPassword(sha1(md5($acesso->getPassword())));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('acesso_index');
        }

        return $this->render('acesso/edit.html.twig', [
            'acesso' => $acesso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="acesso_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Acesso $acesso): Response
    {
        if ($this->isCsrfTokenValid('delete' . $acesso->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($acesso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('acesso_index');
    }
}
