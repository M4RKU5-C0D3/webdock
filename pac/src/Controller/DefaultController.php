<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\DockerService;
use App\Service\EnvironmentService;
use App\Service\SSHConfService;
use App\Service\ClockifyService;

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
    public function docker(DockerService $dockerService): Response
    {
        return $this->render('docker.html.twig', [
            'dockcomp' => $dockerService->get(),
        ]);
    }

    /**
     * @Route("/clockify", name="clockify")
     */
    public function clockify(ClockifyService $clockifyService): Response
    {
        return $this->render('clockify.html.twig', [
            'clockify' => $clockifyService->get(),
        ]);
    }

    /**
     * @Route("/sshconf", name="sshconf")
     */
    public function sshconf(SSHConfService $sshConfService): Response
    {
        return $this->render('sshconf.html.twig', [
            'sshconf' => $sshConfService->get(),
        ]);
    }
}
