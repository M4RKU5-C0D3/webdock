<?php

namespace App\Service;

use m4rku5\Clockify\Clockify;

class ClockifyService
{
    /** @var Clockify */
    private $clockify;

    public function __construct()
    {
        $this->clockify = new Clockify();
    }

    public function get(): string
    {
        return $this->clockify->get();
    }
}
