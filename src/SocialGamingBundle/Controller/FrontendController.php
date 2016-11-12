<?php
/**
 * Created by PhpStorm.
 * User: snickas2
 * Date: 12.11.2016
 * Time: 08:46
 */
namespace SocialGamingBundle\Controller;


use SocialGamingBundle\Entity\Suspect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class FrontendController extends Controller
{
    public function indexAction(){

        return $this->render('SocialGamingBundle:Frontend:index.html.twig');
    }

    public function startFrontAction(Request $request){

    }
    public function suspectFrontAction(Request $request){
        $suspect = new Suspect();
        $suspectFrontForm=$this->createFormBuilder($suspect)
            ->add('imagePath',TextType::class)
            ->add('name',TextType::class)
            ->add('',TextType::class)
            ->getForm();


        $form=$suspectFrontForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors=array();
            $episode = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush();

            return $this->render('SocialGamingBundle:Default:suspectFront.html.twig',array('suspectForm'=>$suspectFrontForm->createView(),'errors'=>$errors));
        }
        return $this->render('SocialGamingBundle:Default:suspectFront.html.twig',array('suspectFrontForm'=>$suspectFrontForm->createView()));


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

            return $this->render('SocialGamingBundle:Default:result.html.twig',array('resultForm'=>$resultForm->createView(),'errors'=>$errors));
        }
        return $this->render('SocialGamingBundle:Default:result.html.twig',array('resultFrontForm'=>$resultForm->createView()));

    }

    public function impressumAction()
    {
        $impressumForm=$this->createFormBuilder();

        return $this->render('SocialGamingBundle:Frontend:impressum.html.twig',array());


    }
}
