<?php

namespace Backend\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendBackBundle:Back:index.html.twig', array());
    }
}
