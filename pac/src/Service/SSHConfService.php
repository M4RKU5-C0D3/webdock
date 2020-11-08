<?php

namespace App\Service;

use m4rku5\SSHConf\SSHConf;

class SSHConfService
{
    /** @var SSHConf */
    private $sshconf;

    public function __construct()
    {
        $this->sshconf = new SSHConf();
    }

    public function get(): string
    {
        return $this->sshconf->get();
    }
}
