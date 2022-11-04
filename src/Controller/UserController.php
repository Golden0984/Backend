<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_usuario')]
    public function index(UserRepository $UserRepository): JsonResponse
    {
       $usuarios = $UserRepository->findAll();
        return $this->json($usuarios,200,[],[ObjectNormalizer::IGNORED_ATTRIBUTES => ['memberServices']]);
    }

    #[Route('/service', name: 'service')]
    public function service(ServiceRepository $ServiceRepository): JsonResponse
    {
       $service = $ServiceRepository->findAll();
        return $this->json($service,200,[],[ObjectNormalizer::IGNORED_ATTRIBUTES =>['userMember']]);
    }
}

    // #[Route('/principalContact', name: 'principal_contact_app')]
    // public function getContact(EntityManagerInterface $em): JsonResponse
    // {
    //     $integrantes = $em->getRepository(Contact::class)->find(1);
    //     return $this->json($integrantes,200,[],[ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER =>function(){
    //         return "hola";
    //     }]);
    // }
