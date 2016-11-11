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

class UserController extends Controller
{
    public function viewAction($id){
        $user=new User();
        $this->getDoctrine()->getRepository('SocialGamingBundle:User')->find($id);

    }
}