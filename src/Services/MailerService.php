<?php

namespace App\Services;

use App\Services\EnvLoader;
use Symfony\Component\Mailer\MailerInterface;
Use Symfony\Component\Mime\Email;

class MailerService
{
    
    public function __construct (private MailerInterface $mailer, private EnvLoader $envLoader) 
    {
        $this->envLoader = $envLoader;
    }

    public function getEmail() : string
    {
        $this->envLoader->load(dirname(__DIR__).'/../.env');
        $email = getenv('Email');
        return $email;
    }

    public function sendEmail(string $subject, string $message, string $from = null): void{
        
        $email = (new Email())
            ->from('noreply@mysite.com')
            ->to(self::getEmail())
            ->subject($subject)
            ->text($message)
            ->html($message);
        $this->mailer->send($email);
    }
}