<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FeedController extends AbstractController
{
    #[Route('/', 'feed.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('feed/feed.html.twig');
    }
}