<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 11.11.16
 * Time: 23:22
 */

namespace SocialGamingBundle\Controller;


use Doctrine\ORM\EntityRepository;
use SocialGamingBundle\Entity\Episode;
use SocialGamingBundle\Entity\Hint;
use SocialGamingBundle\Entity\Show;
use SocialGamingBundle\Entity\Suspect;
use SocialGamingBundle\Entity\Tvshow;
use SocialGamingBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class AdminController extends Controller
{
    public function indexAction(){
        return $this->render('SocialGamingBundle:Admin:index.html.twig');
    }

    public function createUserAction(Request $request){

        $user=new User();
        $userForm=$this->createFormBuilder($user)

        ->add('username',TextType::class, array  ('attr'=> array('class'=>'form-control' )))
        ->add('email',EmailType::class, array  ('attr'=> array('class'=>'form-control')))
        ->add('isActive',CheckboxType::class, array  ('attr'=> array('class'=>'form-control')))
        ->add('save',SubmitType::class, array  ('attr'=> array('class'=>'form-control')))
        ->getForm();



        $form=$userForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $user = $form->getData();
            try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            }catch(\Exception $ex){
                $errors[] =$ex->getMessage();
            }

            $success=false;
            if(count($errors)==0){
                $success=true;
            }
            unset($user);
            unset($userForm);
            $user=new User();
            $userForm=$this->createFormBuilder($user)

                ->add('username',TextType::class, array  ('attr'=> array('class'=>'form-control' )))
                ->add('email',EmailType::class, array  ('attr'=> array('class'=>'form-control')))
                ->add('isActive',CheckboxType::class, array  ('attr'=> array('class'=>'form-control')))
                ->add('save',SubmitType::class, array  ('attr'=> array('class'=>'form-control')))
                ->getForm();

            return $this->render('SocialGamingBundle:Admin:user.html.twig',array('userForm'=>$userForm->createView(),'errors'=>$errors,'success'=>$success));
        }

        return $this->render('SocialGamingBundle:Admin:user.html.twig',array('userForm'=>$userForm->createView()));

    }

    public function createShowAction(Request $request){
        $show=new Tvshow();
        $showForm=$this->createFormBuilder($show)

            ->add('name',TextType::class , array  ('attr'=> array('class'=>'form-control' )))
            ->add('save',SubmitType::class ,array  ('attr'=> array('class'=>'form-control' )))
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

            ->add('name',TextType::class ,array('attr'=> array('class'=>'form-control' )))
            ->add('summary',TextType::class,array('attr'=> array('class'=>'form-control' )))
            ->add('startdate', DateTimeType::class)
            ->add('enddate', DateTimeType::class)
            ->add('show', EntityType::class,array(
                'class'=>'SocialGamingBundle:Tvshow',
                'query_builder'=>function(EntityRepository $er){
                    return null;
                }
            ))

            ->add('save',SubmitType::class,array('attr'=> array('class'=>'form-control' )))


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
            ->add('text',TextType::class ,array('attr'=> array('class'=>'form-control' )))
            ->add('date', DateTimeType::class)
            ->add('episode', EntityType::class,array(
                'class'=>'SocialGamingBundle:Episode',
                'query_builder'=>function(EntityRepository $er){
                    return null;
                }))
            ->add('save',SubmitType::class ,array('attr'=> array('class'=>'form-control' )))
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
            ->add('guilty',ChoiceType::class, array('choices'=>array('yes'=>'1','no'=>'0')))
            ->add('imagepath',TextType::class)
            ->add('episode', EntityType::class,array(
                'class'=>'SocialGamingBundle:Episode',
                'query_builder'=>function(EntityRepository $er){
                    return null;
                }))
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