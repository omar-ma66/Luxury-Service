<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class TestMaillerController extends AbstractController
{
    #[Route('/test/mailler', name: 'app_test_mailler')]
    public function index(MailerInterface $mailer): Response
    {
          $email = new TemplatedEmail()
            ->from('contact@luxury-services.com')
            ->to('devcodefree66@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Test mail')
            ->htmlTemplate("emails/test.html.twig");

        $mailer->send($email);
        return $this->render('test_mailler/index.html.twig', [
            'controller_name' => 'TestMaillerController',
        ]);
    }
}
