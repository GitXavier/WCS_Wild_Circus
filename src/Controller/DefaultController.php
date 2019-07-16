<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DomainController extends AbstractController
{
    /**
     * @Route("/", name="circus_index")
     */
    public function index(){
        return $this->render('default.html.twig');
    }
}
