<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\EnvironmentService;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/env", name="environment")
     */
    public function environment(EnvironmentService $environmentService): Response
    {
        return $this->render('environment.html.twig', [
            'dotenv' => $environmentService->getEnv(),
        ]);
    }

    /**
     * @Route("/docker", name="docker")
     */
    public function docker(): Response
    {
        return $this->render('docker.html.twig');
    }

    /**
     * @Route("/clockify", name="clockify")
     */
    public function clockify(): Response
    {
        return $this->render('clockify.html.twig');
    }
}
