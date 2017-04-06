<?php

namespace SocialGamingBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 */
class Role implements RoleInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the role.
     *
     * This method returns a string representation whenever possible.
     *
     * When the role cannot be represented with sufficient precision by a
     * string, it should return null.
     *
     * @return string|null A string representation of the role, or null
     */
    public function getRole()
    {
        return $this->name;
    }
    /**
     * @var \SocialGamingBundle\Entity\Role
     */
    private $user;


    /**
     * Set user
     *
     * @param \SocialGamingBundle\Entity\Role $user
     *
     * @return Role
     */
    public function setUser(\SocialGamingBundle\Entity\Role $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SocialGamingBundle\Entity\Role
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var \SocialGamingBundle\Entity\GameUser
     */
    private $gameUser;


    /**
     * Set gameUser
     *
     * @param \SocialGamingBundle\Entity\GameUser $gameUser
     *
     * @return Role
     */
    public function setGameUser(\SocialGamingBundle\Entity\GameUser $gameUser = null)
    {
        $this->gameUser = $gameUser;

        return $this;
    }

    /**
     * Get gameUser
     *
     * @return \SocialGamingBundle\Entity\GameUser
     */
    public function getGameUser()
    {
        return $this->gameUser;
    }
}
