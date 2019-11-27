<?php

namespace App\Controller;

use App\Entity\Acesso;
use App\Entity\Consultas;
use App\Entity\Funcionarios;
use App\Entity\Perfil;
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
     * @Route("/", name="agenda", methods={"GET"})
     */
    public function agenda(): Response
    {
        $consultas = $this->getDoctrine()
            ->getRepository(Consultas::class)
            ->findAll();

        return $this->render('consultas/index.html.twig', [
            'consultas' => $consultas,
        ]);
    }

    /**
     * @Route("/{psicologo}/agenda", name="agenda_especifica", methods={"GET"})
     */
    public function agendaEspecifica(Funcionarios $psicologo): Response
    {
        $consultas = $this->getDoctrine()
            ->getRepository(Consultas::class)
            ->findBy([
                'funcionarios' => $psicologo->getId(),
                'consultaConfirmada' => 1
            ]);

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
        $perfil = $this->getDoctrine()->getRepository(Perfil::class)
            ->findOneBy([
                'nome' => 'Psicólogo'
            ]);

        $acesso = $entityManager->getRepository(Acesso::class)->findBy([
            'perfil' => $perfil->getIdperfil()
        ]);

        $funcionarios = [];
        foreach ($acesso as $ac) {
            $funcionarios[] = $ac->getFuncionarios();
        }

        $form = $this->createForm(ConsultasType::class, $consulta, array(
            'psicologos' => $funcionarios
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $temConflito = $this->getDoctrine()->getRepository(Consultas::class)->findBy([
                'data' => $consulta->getData(),
                'funcionarios' => $consulta->getFuncionarios()->getId(),
                'consultaConfirmada' => 1
            ]);
            if ($temConflito) {
                $this->addFlash('warning', 'Esse psicólogo já tem esse horário ocupado.');
                return $this->redirectToRoute('consultas_new');
            }
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
     * @Route("/{id}/confirma/{confirmada}", name="confirma_consulta", methods={"GET","POST"})
     */
    public function confirma(Consultas $consulta, $confirmada): Response
    {
        $temConflito = $this->getDoctrine()->getRepository(Consultas::class)->findBy([
            'data' => $consulta->getData(),
            'funcionarios' => $consulta->getFuncionarios()->getId(),
            'consultaConfirmada' => 1
        ]);
        if ($temConflito && $confirmada) {
            $this->addFlash('warning', 'Esse psicólogo já tem esse horário ocupado.');
            return $this->redirectToRoute('consultas_index');
        }
        $consulta->setConsultaConfirmada($confirmada);
        $this->getDoctrine()->getManager()->flush();
        if ($confirmada) {
            $this->addFlash('success', 'Consulta confirmada!');
        } else {
            $this->addFlash('success', 'Consulta desmarcada!');
        }
        return $this->redirectToRoute('consultas_index');

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
