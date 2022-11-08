<?php

namespace App\Controller;

use App\Entity\AboutUs;
use App\Repository\AboutUsRepository;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    #[Route('/aboutUs', name: 'app_about')]
    public function getAboutUs(AboutUsRepository $aboutUs): JsonResponse
    {
        $integrantes = $aboutUs->findAll();
        return $this->json($integrantes);
    }

    #[Route('/contact', name: 'app_contact')]
    public function getContact(ContactRepository $contact): JsonResponse
    {
        $contacto = $contact->findAll();
        return $this->json($contacto);
    }
}
