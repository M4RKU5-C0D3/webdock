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
        $number = random_int(0, 100);

        return $this->render('base.html.twig', [
            'number' => $number,
            'message' => $messageGenerator->getHappyMessage(),
        ]);
    }
}
