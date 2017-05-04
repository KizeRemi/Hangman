<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;

class GameController extends Controller
{
    /**
     * @Route("/signin", name="game_signin")
     */
    public function signinAction(Request $request)
    {
        return $this->render('game/index.html.twig');
    }

    /**
     * @Route("/won", name="game_won")
     */
    public function wonAction(Request $request)
    {
        return $this->render('game/won.html.twig');
    }

    /**
     * @Route("/game", name="game_game")
     */
    public function gameAction(Request $request)
    {
        return $this->render('game/game.html.twig');
    }

    /**
     * @Route("/failed", name="game_failed")
     */
    public function failedAction(Request $request)
    {
        return $this->render('game/failed.html.twig');
    }

    /**
     * @Route("/game/letter/{letter}", name="game_letter")
     */
    public function letterAction(Request $request)
    {
        return new Response("Ok");
    }

    /**
     * @Route("/game/reset", name="game_reset")
     */
    public function resetAction(Request $request)
    {
        return new Response("Ok");
    }

    /**
     * @Route("/game/contact", name="game_contact")
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contactMail = $this->get('app.contact_mail')->sendEmail($contact);
            $this->addFlash('notice','Votre message a été envoyé.');
        }
        return $this->render('game/contact.html.twig',array(
            'form' => $form->createView()
            ));
    }
}
