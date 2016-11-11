<?php

namespace SocialGamingBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $isactive;

    /**
     * @var integer
     */
    private $userSuspectId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suspect;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $episode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suspect = new \Doctrine\Common\Collections\ArrayCollection();
        $this->episode = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     *
     * @return User
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set userSuspectId
     *
     * @param integer $userSuspectId
     *
     * @return User
     */
    public function setUserSuspectId($userSuspectId)
    {
        $this->userSuspectId = $userSuspectId;

        return $this;
    }

    /**
     * Get userSuspectId
     *
     * @return integer
     */
    public function getUserSuspectId()
    {
        return $this->userSuspectId;
    }

    /**
     * Add suspect
     *
     * @param \SocialGamingBundle\Entity\Suspect $suspect
     *
     * @return User
     */
    public function addSuspect(\SocialGamingBundle\Entity\Suspect $suspect)
    {
        $this->suspect[] = $suspect;

        return $this;
    }

    /**
     * Remove suspect
     *
     * @param \SocialGamingBundle\Entity\Suspect $suspect
     */
    public function removeSuspect(\SocialGamingBundle\Entity\Suspect $suspect)
    {
        $this->suspect->removeElement($suspect);
    }

    /**
     * Get suspect
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuspect()
    {
        return $this->suspect;
    }

    /**
     * Add episode
     *
     * @param \SocialGamingBundle\Entity\Episode $episode
     *
     * @return User
     */
    public function addEpisode(\SocialGamingBundle\Entity\Episode $episode)
    {
        $this->episode[] = $episode;

        return $this;
    }

    /**
     * Remove episode
     *
     * @param \SocialGamingBundle\Entity\Episode $episode
     */
    public function removeEpisode(\SocialGamingBundle\Entity\Episode $episode)
    {
        $this->episode->removeElement($episode);
    }

    /**
     * Get episode
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEpisode()
    {
        return $this->episode;
    }
}

