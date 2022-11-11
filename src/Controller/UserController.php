<?php

namespace App\Controller;

use App\Repository\UsuariosRepository;
use App\Repository\ServiciosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_usuario')]
    public function index(UsuariosRepository $User): JsonResponse
    {
        $usuarios = $User->findAll();
        return $this->json($usuarios,200,[],[ObjectNormalizer::IGNORED_ATTRIBUTES => ['usuarios']]);
    }

}
    // #[Route('/principalContact', name: 'principal_contact_app')]
    // public function getContact(EntityManagerInterface $em): JsonResponse
    // {
    //     $integrantes = $em->getRepository(Contact::class)->find(1);
    //     return $this->json($integrantes,200,[],[ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER =>function(){
    //         return "hola";
    //     }]);
    // return $this->json($usuarios,200,[],[ObjectNormalizer::IGNORED_ATTRIBUTES => ['torneos']]);
    // }
    // }
