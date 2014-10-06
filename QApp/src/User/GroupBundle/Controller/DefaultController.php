<?php

namespace User\GroupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UserGroupBundle:Default:index.html.twig', array('name' => $name));
    }
}
