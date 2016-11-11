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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction(Request $request){

        $user=new User();
        $userForm=$this->createFormBuilder($user)
        ->add('username',TextType::class)
        ->add('email',EmailType::class)
        ->add('isActive',CheckboxType::class)
        ->add('save',SubmitType::class)->getForm();


        $form=$userForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:Admin.html.twig',array('userForm'=>$userForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:Admin.html.twig',array('userForm'=>$userForm->createView()));

    }
}