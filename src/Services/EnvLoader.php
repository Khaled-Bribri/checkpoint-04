<?php

namespace App\Services;

use Symfony\Component\Dotenv\Dotenv;

class EnvLoader
{
    public function __construct(private Dotenv $dotenv)
    {
        $this->dotenv = $dotenv;
    }
    public function load(string $path): void
    {
        $this->dotenv->loadEnv($path);
    }
}