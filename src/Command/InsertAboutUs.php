<?php

namespace App\Command;

use App\Entity\AboutUs;
use App\Entity\Contact;
use App\Repository\AboutUsRepository;
use App\Repository\ContactRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:insert-data',
    description: 'Inserta datos a la BBDD.',
    hidden: false,
    aliases: ['app:data']
)]
class InsertAboutUs extends Command
{

    public function __construct(public AboutUsRepository $aboutUs,public ContactRepository $contact)
    {
        parent::__construct();
    }

    public function ifNotExistsInt(string $nombre): bool
    {
        return $this->aboutUs->findOneBy(['nombre' => $nombre]) == null;
    }

    public function ifNotExistsContact(string $number): bool
    {
        return $this->contact->findOneBy(['telefono' => $number]) == null;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        if ($this->ifNotExistsInt('Beatriz Muñoz')) {
            $integrante = new AboutUs();
            $integrante->setNombre("Beatriz Muñoz");
            $integrante->setImagen("img/p1.PNG");
            $integrante->setTitulacion("Data Enginer");
            $integrante->setDescripcion("I am 21 years old, I am currently in my last year of higher degree of Web Application Development (DAW) in the study center STUCOM, I have also done a course in web design and publishing.");
            $this->aboutUs->save($integrante, true);
        }


        if ($this->ifNotExistsInt('Manish Thakur')) {
            $integrante2 = new AboutUs();
            $integrante2->setNombre("Manish Thakur");
            $integrante2->setImagen("img/p2.jpeg");
            $integrante2->setTitulacion("PHP Ninja");
            $integrante2->setDescripcion("STUCOM students currently studying the second year of DAW (web application development), other studies: DAM (multiplatform application development) and Technological baccalaureate. With experience as an internship in web development in many companies");
            $this->aboutUs->save($integrante2, true);
        }

        if ($this->ifNotExistsInt('Laura Alison')) {
            $integrante3 = new AboutUs();
            $integrante3->setNombre("Laura Alison");
            $integrante3->setImagen("img/laura.jpeg");
            $integrante3->setTitulacion("Full stack developer");
            $integrante3->setDescripcion("Hello, my name is Laura and I'm in charge of both frontend and backend programming. And I'm superexcited about keeping this project going!");
            $this->aboutUs->save($integrante3, true);
        }

        if ($this->ifNotExistsContact(930092393)) {
            $contacto = new Contact();
            $contacto->setTelefono(930092393);
            $contacto->setEmail("info@test.it");
            $contacto->setDireccion("Calle terenamera, 1, 00184 Spain");
            $this->contact->save($contacto, true);
        }
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}
