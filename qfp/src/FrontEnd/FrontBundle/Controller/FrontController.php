<?php

namespace FrontEnd\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontEndFrontBundle:Front:index.html.twig', array());
    }
}
