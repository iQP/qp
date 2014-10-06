<?php

namespace Back\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackBackBundle:Back:index.html.twig', array());
    }
}
