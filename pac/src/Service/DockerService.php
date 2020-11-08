<?php

namespace App\Service;

use m4rku5\DockComp\DockComp;

class DockerService
{
    /** @var DockComp $dockcomp */
    private $dockcomp;

    public function __construct()
    {
        $this->dockcomp = new DockComp('/var/project' . '/docker-compose.yml');
        $this->dockcomp->service('web')
            ->setImage('hello/world')
            ->setContainerName('demo')
            ->setEnvFile('./.env')
            ->setRestart('always');
    }

    public function get(): string
    {
        return $this->dockcomp->get();
    }
}
