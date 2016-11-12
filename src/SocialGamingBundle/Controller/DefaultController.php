<?php

namespace SocialGamingBundle\Controller;

use SocialGamingBundle\Entity\Suspect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {


        return $this->render('SocialGamingBundle:Default:index.html.twig');
    }
    public function startFrontAction(Request $request){
    $startFrontForm=$this->createFormBuilder()
        ->add('',TextType::class)
        ->add('',TextType::class)
        ->add('',TextType::class)
        ->getForm();


    $form=$startFrontForm->handleRequest($request);

    return $this->render('SocialGamingBundle:Default:startFront.html.twig',array('startFrontForm'=>$startFrontForm->createView()));


}

    }

