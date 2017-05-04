<?php

namespace AppBundle\ContactMail;
use AppBundle\Entity\Contact;

class ContactMail
{
    protected $mailer;
    protected $twig;

    public function __construct($mailer, $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendEmail(Contact $contact)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($contact->getSubject())
            ->setFrom($contact->getSender())
            ->setTo("remi.mavillaz@live.fr")
            ->setBody($this->twig->render('emails/contact.html.twig', array('message' => $contact->getDescription())),
                'text/html'
            );
        $this->mailer->send($message);
    }
}