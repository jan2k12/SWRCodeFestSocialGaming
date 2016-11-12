<?php

namespace SocialGamingBundle\Entity;

/**
 * Hint
 */
class Hint
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \SocialGamingBundle\Entity\Episode
     */
    private $episode;


    /**
     * Get id
     *
     * @return integer
     */
    public function __construct()
    {
        $this->date=new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Hint
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Hint
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set episode
     *
     * @param \SocialGamingBundle\Entity\Episode $episode
     *
     * @return Hint
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
}
