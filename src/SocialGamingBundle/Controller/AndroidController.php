<?php
/**
 * Created by PhpStorm.
 * User: frithjof
 * Date: 12.11.2016
 * Time: 08:46
 */
namespace SocialGamingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AndroidController extends Controller
{
    public function getHintsAction(){
        return new Response('{
            "notifications" : [
                {
                    "hint" : "Test",
                    "show" : "Tatort",
                    "id" : 196
                },
                {
                    "hint" : "Test2",
                    "show" : "Tatort",
                    "id" : 197
                },
            ]
        }');
    }

}
