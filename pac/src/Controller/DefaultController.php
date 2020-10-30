<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(MessageGenerator $messageGenerator): Response
    {
        return $this->render('base.html.twig', [
            'menu1' => [
                'Environment' => '#',
                'Docker' => '#',
            ],
            'menu2' => [
                'hub.docker.com' => 'https://hub.docker.com/r/m4rku5/webdock',
                'github.com' => 'https://github.com/M4RKU5-C0D3/webdock',
            ],
            'message' => $messageGenerator->getHappyMessage(),
        ]);
    }
}
