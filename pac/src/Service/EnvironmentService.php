<?php

namespace App\Service;

use m4rku5\Dotenv\Dotenv;

class EnvironmentService
{
    /** @var Dotenv $dotenv */
    private $dotenv;

    public function __construct()
    {
        $this->dotenv = new Dotenv();
        $this->dotenv->load('/var/project' . '/.env');
    }

    public function getEnv(): array
    {
        return $this->dotenv->getEnv();
    }
}

/* @see https://getcomposer.org/doc/05-repositories.md#path */