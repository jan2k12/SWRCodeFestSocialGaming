<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 16.11.16
 * Time: 22:06
 */

namespace SocialGamingBundle\Controller;


use Monolog\Handler\LogEntriesHandler;
use Monolog\Logger;
use SocialGamingBundle\Entity\GameUser;
use SocialGamingBundle\Entity\User;
use SocialGamingBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new GameUser();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            try{
            $password=$this->get('security.password_encoder')->encodePassword($user,$user->getPlainPassword());
            $user->setPassword($password);
            $UserRoles=$this->getDoctrine()->getRepository('SocialGamingBundle:Role')->findBy(array('name'=>'ROLE_USER'));
            $user->setRoles($UserRoles[0]);
            $em=$this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();
            }catch(\Exception $ex){
                $this->get('logger')->error($ex->getMessage());
                $error='Sorry Something went Wrong with the Registration';
            }
            if(!isset($error)){
                return $this->render('SocialGamingBundle:User:register_success.html.twig');
            }else{
                return $this->render('SocialGamingBundle:User:register.html.twig',array('error'=>$error,'form'=>$form->createView()));
            }
        }else{
            $error=$form->getErrors();
        }

        return $this->render('SocialGamingBundle:User:register.html.twig',array('form'=>$form->createView(),'error'=>$error));
    }
}