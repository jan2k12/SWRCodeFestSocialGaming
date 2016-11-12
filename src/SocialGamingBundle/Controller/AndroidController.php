<?php
/**
 * Created by PhpStorm.
 * User: snickas2
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
        $hints = $this->getDoctrine()->getRepository('SocialGamingBundle:Hint')->findAll();

        $data = array();
        foreach ($hints as $hint) {
            $elem = new \stdClass();
            $elem->hint = $hint->getText();
            $elem->show = $hint->getEpisode()->getShow()->getName();
            $elem->id = $hint->getId();
            array_push($data, $elem);
        }

        return new JsonResponse($data);
    }
}
