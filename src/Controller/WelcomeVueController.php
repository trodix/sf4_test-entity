<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeVueController extends Controller
{
    /**
     * @Route("/vue", name="welcome_vue")
     */
    public function index()
    {
        return $this->render('welcome_vue/index.html.twig', [
            'controller_name' => 'WelcomeVueController',
        ]);
    }
}
