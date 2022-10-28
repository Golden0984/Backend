<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class apicontroller
{
    #[Route('/index')]
    public function homepage(){
        $json = file_get_contents(__DIR__ . '/../validate/index.json');
        $data = json_decode($json, true);

        return new JsonResponse($data);
    }

    #[Route('/about')]
    public function About(){
        $json = file_get_contents(__DIR__ . '/../validate/about.json');
        $data = json_decode($json, true);

        return new JsonResponse($data);
    }

    #[Route('/contacto')]
    public function contact(){
        $json = file_get_contents(__DIR__ . '/../validate/contact.json');
        $data = json_decode($json, true);

        return new JsonResponse($data);
    }
}
    