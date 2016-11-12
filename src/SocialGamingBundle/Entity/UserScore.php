<?php

namespace SocialGamingBundle\Entity;

/**
 * UserScore
 */
class UserScore
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $userid;

    /**
     * @var integer
     */
    private $score;


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
     * Set userid
     *
     * @param string $userid
     *
     * @return UserScore
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return UserScore
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }
    /**
     * @var string
     */
    private $episodeid;


    /**
     * Set episodeid
     *
     * @param string $episodeid
     *
     * @return UserScore
     */
    public function setEpisodeid($episodeid)
    {
        $this->episodeid = $episodeid;

        return $this;
    }

    /**
     * Get episodeid
     *
     * @return string
     */
    public function getEpisodeid()
    {
        return $this->episodeid;
    }
}
