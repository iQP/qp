<?php

namespace Backend\UserNavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserNavController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendUserNavBundle:UserNav:index.html.twig', array());
    }
}
