<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UsuariosRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PruebaController extends AbstractController
{
    #[Route('/prueba', name: 'app_prueba')]
    public function index(UsuariosRepository $user): JsonResponse
    {
        $usuarios = $user->findAll();
        return dd($usuarios);
    }
}
