<?php
/**
 * Created by PhpStorm.
 * User: snickas2
 * Date: 12.11.2016
 * Time: 08:46
 */
namespace SocialGamingBundle\Controller;


use SocialGamingBundle\Entity\Suspect;
use SocialGamingBundle\Entity\User;
use SocialGamingBundle\Entity\Usertipp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class FrontendController extends Controller
{
    public function indexAction(){
        $actuatlTvShows=$this->getDoctrine()->getRepository('SocialGamingBundle:Tvshow')->findAll();
        return $this->render('SocialGamingBundle:Frontend:index.html.twig',array('shows'=>$actuatlTvShows));
    }


    public function startFrontAction(){
        $actuatlTvShows=$this->getDoctrine()->getRepository('SocialGamingBundle:Tvshow')->findAll();
        return $this->render('SocialGamingBundle:Frontend:startFront.html.twig',array('shows'=>$actuatlTvShows));
    }
    public function episodesViewAction($showId){
        $episodes=$this->getDoctrine()->getEntityManager()->createQuery('SELECT e from SocialGamingBundle:Episode as e where e.show=:showid')->setParameter('showid',$showId)->getResult();
        return $this->render('SocialGamingBundle:Frontend:episodes.html.twig',array('episodes'=>$episodes));
    }

    public function episodeViewAction($episodeId,Request $request){
        $episode=$this->getDoctrine()->getRepository('SocialGamingBundle:Episode')->find($episodeId);
        $show=$this->getDoctrine()->getRepository('SocialGamingBundle:Tvshow')->find($episode->getShow()->getId());
        $hints=$this->getDoctrine()->getEntityManager()->createQuery('SELECT h from SocialGamingBundle:Hint as h where h.episode=:episode')->setParameter('episode',$episodeId)->getResult();
        $suspects=$this->getDoctrine()->getEntityManager()->createQuery('SELECT s from SocialGamingBundle:Suspect as s where s.episode=:episode')->setParameter('episode',$episodeId)->getResult();
        $user=$this->getDoctrine()->getRepository('SocialGamingBundle:User')->find(1);
        $userTipp=new Usertipp();
        $userTipp->setUserid($user->getId());
        $userTipp->setDate(new \DateTime());


        $suspectForm=$this->createFormBuilder($userTipp)->add('suspectId',EntityType::class,array(
            'class'=>'SocialGamingBundle:Suspect',
            'choices'=>$suspects,
            'expanded'=>true,
            'multiple'=>false,
            'by_reference'=>false
        ))
            ->add('save',SubmitType::class)->getForm();

        $form=$suspectForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $userTipp = $form->getData();
            $userTipp->setSuspectId($userTipp->getSuspectId()->getId());
            try{
                $em = $this->getDoctrine()->getManager();
                $em->persist($userTipp);
                $em->flush();
            }catch(\Exception $ex){
                $errors[] =$ex->getMessage();
            }

            return $this->render('SocialGamingBundle:Frontend:afterVoting.html.twig',array('user'=>$user,'errors'=>$errors));
        }
         return $this->render('SocialGamingBundle:Frontend:episode.html.twig',array('suspectForm'=>$suspectForm->createView(),'hints'=>$hints,'show'=>$show,'episode'=>$episode));
    }

    public function suspectFrontAction(Request $request){
        $suspect = new Suspect();
        $suspectFrontForm=$this->createFormBuilder($suspect)
            ->add('imagePath',TextType::class)
            ->add('name',TextType::class)
            ->getForm();
        $form=$suspectFrontForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $episode = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush();

            return $this->render('SocialGamingBundle:Frontend:suspectFront.html.twig',array('suspectForm'=>$suspectFrontForm->createView(),'errors'=>$errors));
        }
        return $this->render('SocialGamingBundle:Frontend:suspectFront.html.twig',array('suspectFrontForm'=>$suspectFrontForm->createView()));


    }
    public function resultAction(Request $request){

        $resultForm=$this->createFormBuilder()
            ->add('imagePath',TextType::class)
            ->add('name',TextType::class)
            ->add('',TextType::class)
            ->getForm();


        $form=$resultForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $result = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();

            return $this->render('SocialGamingBundle:Frontend:result.html.twig',array('resultForm'=>$resultForm->createView(),'errors'=>$errors));
        }
        return $this->render('SocialGamingBundle:Frontend:result.html.twig',array('resultForm'=>$resultForm->createView()));

    }

    public function impressumAction()
    {
        $impressumForm=$this->createFormBuilder();

        return $this->render('SocialGamingBundle:Frontend:impressum.html.twig',array());


    }

    public function highscoreAction($userId=null){

            return $this->render('SocialGamingBundle:Frontend:highscore.html.twig',array());
    }
}
