<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 11.11.16
 * Time: 23:22
 */

namespace SocialGamingBundle\Controller;


use SocialGamingBundle\Entity\Episode;
use SocialGamingBundle\Entity\Hint;
use SocialGamingBundle\Entity\Show;
use SocialGamingBundle\Entity\Suspect;
use SocialGamingBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction(){
        return $this->render('SocialGamingBundle:Admin:index.html.twig');
    }

    public function createUserAction(Request $request){

        $user=new User();
        $userForm=$this->createFormBuilder($user)
        ->add('username',TextType::class)
        ->add('email',EmailType::class)
        ->add('isActive',CheckboxType::class)
        ->add('save',SubmitType::class)
        ->getForm();


        $form=$userForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:user.html.twig',array('userForm'=>$userForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:user.html.twig',array('userForm'=>$userForm->createView()));

    }

    public function createShowAction(Request $request){
        $show=new Show();
        $showForm=$this->createFormBuilder($show)
            ->add('name',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();


        $form=$showForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $show = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($show);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:show.html.twig',array('showForm'=>$showForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:show.html.twig',array('showForm'=>$showForm->createView()));
    }

    public function createEpisodeAction(Request $request){
        $episode=new Episode();
        $episodeForm=$this->createFormBuilder($episode)
            ->add('name',TextType::class)
            ->add('startdate',DateTimeType::class)
            ->add('enddate',DateTimeType::class)
            ->add('summery',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();


        $form=$episodeForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $episode = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:episode.html.twig',array('episodeForm'=>$episodeForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:episode.html.twig',array('episodeForm'=>$episodeForm->createView()));
    }
    public function createHintAction(Request $request){
        $hint=new Hint();
        $hintForm=$this->createFormBuilder($hint)
            ->add('text',TextType::class)
            ->add('date', DateTimeType::class,array(
                'input'=>'timestamp',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm:ss'))
            ->add('save',SubmitType::class)
            ->getForm();


        $form=$hintForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $hint = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($hint);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:hint.html.twig',array('hintForm'=>$hintForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:hint.html.twig',array('hintForm'=>$hintForm->createView()));
    }
    public function createSuspectAction(Request $request){
        $suspect=new Suspect();
        $suspectForm=$this->createFormBuilder($suspect)
            ->add('name',TextType::class)
            ->add('guilty',CheckboxType::class)
            ->add('imagepath',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();


        $form=$suspectForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $suspect = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($suspect);
            $em->flush();

            return $this->render('SocialGamingBundle:Admin:suspect.html.twig',array('suspectForm'=>$suspectForm->createView(),'errors'=>$errors));
        }

        return $this->render('SocialGamingBundle:Admin:suspect.html.twig',array('suspectForm'=>$suspectForm->createView()));
    }
}