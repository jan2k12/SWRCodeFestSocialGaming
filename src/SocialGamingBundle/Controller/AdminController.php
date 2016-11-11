<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 11.11.16
 * Time: 23:22
 */

namespace SocialGamingBundle\Controller;


use SocialGamingBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction(){

        return $this->render('SocialGamingBundle:Admin:Admin.html.twig',array('userForm'=>$userForm->createView()));

    }
}