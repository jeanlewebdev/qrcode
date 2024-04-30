<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoucouController extends AbstractController
{
    #[Route('/api/coucou', name: 'app_coucou')]
    public function index(): Response
    {
        $message = "coucou ".$this->getUser()->getEmail();
        return $this->json($message, 200);
    }
}
