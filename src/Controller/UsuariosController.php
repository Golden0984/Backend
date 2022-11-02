<?php

namespace App\Controller;

use App\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuariosController extends AbstractController
{
    #[Route('/usuarios', name: 'app_usuarios')]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $usuarios = $em->getRepository(Usuarios::class)->findAll();
        return $this->json($usuarios);
    }
}
