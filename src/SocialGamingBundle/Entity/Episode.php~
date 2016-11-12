<?php

namespace SocialGamingBundle\Entity;

use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Episode
 */
class Episode
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
     * @var \DateTime
     */
    private $startdate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $enddate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $summary;

    /**
     * @var \SocialGamingBundle\Entity\Show
     */
    private $show;

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
        $this->startdate = new \DateTime();
        $this->enddate = new \DateTime();
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
     * @return Episode
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
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Episode
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return Episode
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Episode
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set show
     *
     * @param \SocialGamingBundle\Entity\Tvshow $show
     *
     * @return Episode
     */
    public function setShow(\SocialGamingBundle\Entity\Tvshow $show = null)
    {
        $this->show = $show;

        return $this;
    }

    /**
     * Get show
     *
     * @return \SocialGamingBundle\Entity\Tvshow
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Add user
     *
     * @param \SocialGamingBundle\Entity\User $user
     *
     * @return Episode
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

    public function __toString()
    {
        return $this->name;
    }
}
