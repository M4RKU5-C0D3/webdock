<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    const MENU1 = [
        'Dashboard' => '',
        'Environment' => 'env',
        'Docker' => 'docker',
    ];
    const  MENU2 = [
        'hub.docker.com' => 'https://hub.docker.com/r/m4rku5/webdock',
        'github.com' => 'https://github.com/M4RKU5-C0D3/webdock',
    ];

    /**
     * @Route("/")
     */
    public function index(MessageGenerator $messageGenerator): Response
    {
        return $this->render('base.html.twig', [
            'menu1' => self::MENU1,
            'menu2' => self::MENU2,
            'message' => $messageGenerator->getHappyMessage(),
        ]);
    }

    /**
     * @Route("/env")
     */
    public function environment(): Response
    {
        return $this->render('environment.html.twig', [
            'menu1' => self::MENU1,
            'menu2' => self::MENU2,
        ]);
    }

    /**
     * @Route("/docker")
     */
    public function docker(): Response
    {
        return $this->render('docker.html.twig', [
            'menu1' => self::MENU1,
            'menu2' => self::MENU2,
        ]);
    }
}
