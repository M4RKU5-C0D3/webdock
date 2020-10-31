<?php

namespace App\Service;

use sixlive\DotenvEditor\DotenvEditor;

class EnvironmentService
{
    public function getEnv(): array
    {
        return $this->getDotenvEditor()->getEnv();
    }

    public function getDotenvEditor(): DotenvEditor
    {
        /* @see https://packagist.org/packages/sixlive/dotenv-editor */

        $editor = new DotenvEditor;

        $editor->load('/var/project' . '/.env');

        return $editor;
    }
}
