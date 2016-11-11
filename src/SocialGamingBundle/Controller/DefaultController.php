<?php

namespace SocialGamingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {


        return $this->render('SocialGamingBundle:Default:index.html.twig');
    }
}
