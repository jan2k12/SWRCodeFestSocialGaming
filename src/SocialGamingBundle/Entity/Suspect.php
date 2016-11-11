<?php

namespace SocialGamingBundle\Entity;

/**
 * Suspect
 */
class Suspect
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
     * @var boolean
     */
    private $guilty;

    /**
     * @var string
     */
    private $imagepath;

    /**
     * @var \SocialGamingBundle\Entity\Episode
     */
    private $episode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Suspect
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
     * Set guilty
     *
     * @param boolean $guilty
     *
     * @return Suspect
     */
    public function setGuilty($guilty)
    {
        $this->guilty = $guilty;

        return $this;
    }

    /**
     * Get guilty
     *
     * @return boolean
     */
    public function getGuilty()
    {
        return $this->guilty;
    }

    /**
     * Set imagepath
     *
     * @param string $imagepath
     *
     * @return Suspect
     */
    public function setImagepath($imagepath)
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    /**
     * Get imagepath
     *
     * @return string
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }

    /**
     * Set episode
     *
     * @param \SocialGamingBundle\Entity\Episode $episode
     *
     * @return Suspect
     */
    public function setEpisode(\SocialGamingBundle\Entity\Episode $episode = null)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return \SocialGamingBundle\Entity\Episode
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Add user
     *
     * @param \SocialGamingBundle\Entity\User $user
     *
     * @return Suspect
     */
    public function addUser(\SocialGamingBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \SocialGamingBundle\Entity\User $user
     */
    public function removeUser(\SocialGamingBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}

