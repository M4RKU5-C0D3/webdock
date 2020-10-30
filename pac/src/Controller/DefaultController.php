<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    const  MENU2 = [
        'hub.docker.com' => 'https://hub.docker.com/r/m4rku5/webdock',
        'github.com' => 'https://github.com/M4RKU5-C0D3/webdock',
    ];

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'menu2' => self::MENU2,
        ]);
    }

    /**
     * @Route("/env", name="environment")
     */
    public function environment(): Response
    {
        return $this->render('environment.html.twig', [
            'menu2' => self::MENU2,
        ]);
    }

    /**
     * @Route("/docker", name="docker")
     */
    public function docker(): Response
    {
        return $this->render('docker.html.twig', [
            'menu2' => self::MENU2,
        ]);
    }
}
