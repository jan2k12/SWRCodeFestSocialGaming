<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 11.11.16
 * Time: 23:22
 */

namespace SocialGamingBundle\Controller;


use Doctrine\DBAL\Types\TextType;
use SocialGamingBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class AdminController extends Controller
{
    public function indexAction(){

        $userForm=$this->createFormBuilder(new User())
        ->add('username',TextType::TEXT)
        ->add('email',EmailType::class)
        ->add('isActive',)

        return $this->render('SocialGamingBundle:Admin:Admin.html.twig',array('userForm'=>$userForm->createView()));

    }
}