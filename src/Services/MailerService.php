<?php

namespace App\Services;

use App\Services\EnvLoader;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    
    public function __construct (private MailerInterface $mailer, private EnvLoader $envLoader) 
    {
        $this->envLoader = $envLoader;
        $this->mailer = $mailer;
    }

    public function getEmail() : string
    {
        $this->envLoader->load(dirname(dirname(__DIR__)). '/.env.local');
        $email = $_ENV['EMAIL'];
        return $email;
    }

    public function sendEmail(string $subject, string $message, string $from): void{
        $email = (new (new TemplatedEmail())())
            ->from($from)
            ->to(self::getEmail())
            ->cc(self::getEmail())
            ->subject($subject)
            ->text($message)
            ->html($message);
        $this->mailer->send($email);
    }
}