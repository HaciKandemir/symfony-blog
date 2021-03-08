<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('home/index.html.twig');
    }
}
