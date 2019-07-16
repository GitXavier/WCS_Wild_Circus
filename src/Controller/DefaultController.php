<?php

namespace App\Controller;

use App\Entity\Program;
use App\Form\SearchType;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="circus_index")
     */
    public function index()
    {
        return $this->render('default.html.twig');
    }


    /**
     * @Route("/rechercher", name="search")
     * @param Request $request
     * @param Program $program
     * @return Response
     */
    public function search(Request $request, ProgramRepository $programRepository)
    {
        $filter = $this->createForm(SearchType::class);
        $programs = [];

        $form = $filter->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $programs = $programRepository->searchProgram($form->getData());
        }

        return $this->render('search.html.twig', [
            'searchProgramForm' => $filter->createView(),
            'programs' => $programs
        ]);
    }


    /**
     * @Route("/billetterie", name="ticket")
     * @return Response
     */
    public function ticket()
    {
        return $this->render('ticket.html.twig');
    }
}