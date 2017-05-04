<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/hello/world", name="default_hello")
     */
    public function helloAction(Request $request)
    {
        return new Response("Hello World");
    }

    /**
     * @Route("/hello/{name}", name="default_name")
     */
    public function nameAction(Request $request, $name)
    {
            $translated = $this->get('translator')->trans('Hello '.$name);

        return new Response($translated);
    }

    /**
     * @Route("/birthday/{day}/{month}", name="default_birthday", requirements={"day" = "(0[1-9]|[12]\d|3[01])", "month" = "(0[1-9]|1[012])"})
     */
    public function birthdayAction(Request $request, $day, $month)
    {
        $now   = new \DateTime("2017-".$month."-".$day);
        $interval = new \DateInterval('P1Y');
        $response = $now->format('Y : l')."<br>";
        for ($i=0; $i<9; $i++) {
            $response .= $now->add($interval)->format('Y : l')."<br>";
        }
        dump($response);
        return new Response($response);
    }
}
