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
        string $template,
        mixed $options = null,
    ): void {
        $email = (new TemplatedEmail())
            ->from($this->envLoader->getEmail())
            ->to($receiver)
            ->subject($subject)
            // path of the Twig template to render
            ->html($template)
            // pass variables (name => value) to the template
            ->context([
                'update_date' => new DateTime('now'),
                'options' => $options,
            ]);

        $this->mailer->send($email);

        return;
    }
}
