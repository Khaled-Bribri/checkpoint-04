<?php

namespace App\Service;

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
    public function getEmail() : string
    {
        self::load(dirname(dirname(__DIR__)). '/.env.local');
        $email = $_ENV['EMAIL'];
        return $email;
    }
}