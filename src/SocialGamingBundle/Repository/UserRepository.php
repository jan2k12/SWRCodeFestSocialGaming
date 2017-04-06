<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 17.11.16
 * Time: 23:06
 */

namespace SocialGamingBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRepository extends EntityRepository implements UserLoaderInterface
{

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $username The username
     *
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        /**@var \SocialGamingBundle\Entity\GameUser $user*/
       $user= $this->createQueryBuilder('u')
           ->where('u.username=:username OR u.email=:email')
           ->setParameter('username',$username)
           ->setParameter('email',$username)
           ->getQuery()->getOneOrNullResult();
        return $user;
    }
}