<?php

class PremierLeagueSuspensions
{
    const URL_PL_SUSPENSIONS
        = 'http://www.thefa.com/football-rules-governance/discipline/suspensions';

    /**
     * Curl object
     *
     * @var resource
     */
    private $_ch;

    /**
     * Player Name
     *
     * @var string
     */
    private $_playerName;

    /**
     * Club Name
     *
     * @var string
     */
    private $_clubName;

    /**
     * Dates of suspension
     *
     * @var string
     */
    private $_dates;

    /**
     * Duration of suspension
     *
     * @var integer
     */
    private $_duration;

    /**
     * Constructor
     *
     * Initialize Curl and set a few options
     */
    public function __construct()
    {
        date_default_timezone_set('Europe/Stockholm');
        $this->_ch = curl_init();
        curl_setopt($this->_ch, CURLOPT_HEADER, true);
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->_ch, CURLOPT_TIMEOUT, 30);
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        curl_close($this->_ch);
    }

    /**
     * GetPLSuspensions
     *
     * @return void
     */
    public function getPlSuspensions()
    {
        curl_setopt($this->_ch, CURLOPT_URL, self::URL_PL_SUSPENSIONS);
        $html = curl_exec($this->_ch);
        preg_match_all(
            '/<td>(\w{5,}|\w* \w*|\w* \w* \w*|\w* \w*-\w*)<\/td>/',
            $html,
            $matches1
        );
        preg_match_all('/<td><a title="(.*)" href/', $html, $matches2);
        preg_match_all('/<td>(\d\d\.\d\d\.\d\d\d\d)<\/td>/', $html, $matches3);
        preg_match_all('/<td>(\d)<\/td>/', $html, $matches4);
        
        $this->_playerName = $matches1[1];
        $this->_clubName   = $matches2[1];
        $this->_dates      = $matches3[1];
        $this->_duration   = $matches4[1];
        $this->_clubName   = array_map('trim', $this->_clubName);
    }
    
    /**
     * GetPlayerName
     *
     * @return array<String> Player Name
     */
    public function getPlayerName()
    {
        return $this->_playerName;
    }

    /**
     * GetClubName
     *
     * @return array<String> Club Name
     */
    public function getClubName()
    {
        return $this->_clubName;
    }
    
    /**
     * GetDates
     *
     * @return array<String> Dates
     */
    public function getDates()
    {
        return $this->_dates;
    }
    
    /**
     * GetDuration
     *
     * @return array<String> Duration
     */
    public function getDuration()
    {
        return $this->_duration;
    }
}
