<?php

namespace App\Service;

use m4rku5\Dotenv\Dotenv;

class EnvironmentService
{
    /** @var Dotenv $dotenv */
    private $dotenv;

    public function __construct()
    {
        $this->dotenv = new Dotenv('/var/project' . '/.env');
        $this->dotenv->set('PROJECT_DOCUMENTROOT', 'test'); // TODO@MM: remove debug
        $this->dotenv->enable('PROJECT_DOCUMENTROOT'); // TODO@MM: remove debug
        $this->dotenv->set('HELLO', 'World'); // TODO@MM: remove debug
        $this->dotenv->disable('HELLO'); // TODO@MM: remove debug
        $this->dotenv->unset('DOCKER_PORT'); // TODO@MM: remove debug
    }

    public function getEnv()
    {
        return $this->dotenv->get();
    }
}

/* @see https://getcomposer.org/doc/05-repositories.md#path */