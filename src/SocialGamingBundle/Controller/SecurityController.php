<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 16.11.16
 * Time: 20:58
 */

namespace SocialGamingBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request){
        $authUtils=$this->get('security.authentication_utils');
        $error=$authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('Security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}