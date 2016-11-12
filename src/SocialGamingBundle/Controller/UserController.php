<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 11.11.16
 * Time: 23:56
 */

namespace SocialGamingBundle\Controller;


use SocialGamingBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function viewAction($id){
        $user=new User();
        $this->getDoctrine()->getRepository('SocialGamingBundle:User')->find($id);

    }

    public function loginAction(){
        $_SESSION["loggedIn"] = true;
        return new JsonResponse(true);
    }

    public function logoutAction(){
        $_SESSION["loggedIn"] = false;
        return new JsonResponse(true);
    }


    public function isLoggedInAction(){
        return new JsonResponse(["isLoggedIn" => isset($_SESSION["loggedIn"]) ? $_SESSION["loggedIn"] : false]);
    }

}