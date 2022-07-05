<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('login.html.twig', 'user.index', methods: ['GET'])]
    public function login(): Response
    {
        return $this->render('user/login.html.twig');
    }
}