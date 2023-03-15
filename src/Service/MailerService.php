<?php

namespace App\Service;

use App\Service\EnvLoader;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use DateTime;

class MailerService
{
    private MailerInterface $mailer;
    private EnvLoader $envLoader;
    public function __construct(MailerInterface $mailer, EnvLoader $envLoader)
    {
        $this->mailer = $mailer;
        $this->envLoader = $envLoader;
    }

    public function sendEmail(
        string $receiver,
        string $subject,
        string $text,
        mixed $options = null,
    ): void {
        $email = (new Email())
            ->from($this->envLoader->getEmail())
            ->to($receiver)
            ->subject($subject)
            ->text($text)
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);

        return;
    }
}
