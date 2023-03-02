<?php

namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
Use Symfony\Component\Mime\Email;

class MailerService
{
    
    public function __construct (private MailerInterface $mailer) 
    {

    }

    public function sendEmail(string $to, string $subject, string $message, string $from = null): void{
        $email = (new Email())
            ->from('noreply@mysite.com')
            ->to($to)
            ->subject($subject)
            ->text($message)
            ->html($message);
        $this->mailer->send($email);
    }
}