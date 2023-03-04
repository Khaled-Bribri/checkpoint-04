<?php

namespace App\Services;

use App\Services\EnvLoader;
use Symfony\Component\Mime\Email;
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
        $this->envLoader->load(dirname(dirname(__DIR__)). '/.env');
        $email = $_ENV['EMAIL'];
        return $email;
    }

    public function sendEmail(string $subject, string $message, string $from): void{
        $email = (new Email())
            ->from($from)
            ->to(self::getEmail())
            ->subject($subject)
            ->text($message);
        $this->mailer->send($email);
    }
}