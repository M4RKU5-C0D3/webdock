<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use sixlive\DotenvEditor\DotenvEditor;

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
    public function environment(): Response
    {
        /* @see https://packagist.org/packages/sixlive/dotenv-editor */
        $editor = new DotenvEditor;

        $editor->load('/var/project' . '/.env');

        return $this->render('environment.html.twig', [
            'dotenv' => $editor->getEnv(),
        ]);
    }

    /**
     * @Route("/docker", name="docker")
     */
    public function docker(): Response
    {
        return $this->render('docker.html.twig');
    }
}
