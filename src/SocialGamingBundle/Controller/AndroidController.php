<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: frithjof
=======
 * User: snickas2
>>>>>>> master
 * Date: 12.11.2016
 * Time: 08:46
 */
namespace SocialGamingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AndroidController extends Controller
{
    public function getHintsAction(){
        $hint1 = new \stdClass();
        $hint1->hint = "Test";
        $hint1->show = "Tatort";
        $hint1->id = 196;

        $data = array(
        );

        $data[0] = $hint1;

        return new JsonResponse($data);
    }
}
