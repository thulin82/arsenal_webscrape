<?php
/**
* PremierLeagueSuspensions
*
* PHP version 5
*
* @category PremierLeagueSuspensions
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* PremierLeagueSuspensions
*
* PHP version 5
*
* @category PremierLeagueSuspensions
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class PremierLeagueSuspensions
{
    const URL_PL_SUSPENSIONS
        = 'http://www.thefa.com/football-rules-governance/suspensions';

    private $_ch;
    private $_playerName;
    private $_clubName;
    private $_dates;
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
    public function getPLSuspensions()
    {
        curl_setopt($this->_ch, CURLOPT_URL, self::URL_PL_SUSPENSIONS);
        $html = curl_exec($this->_ch);
        preg_match_all(
            '/<td>(\w{5,}|\w* \w*|\w* \w* \w*|\w* \w*-\w*)<\/td>/',
            $html, $matches1
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
    * @return string Player Name
    */
    public function getPlayerName()
    {
        return $this->_playerName;
    }

    /**
    * GetClubName
    *
    * @return string Club Name
    */
    public function getClubName()
    {
        return $this->_clubName;
    }
    
    /**
    * GetDates
    *
    * @return string Dates
    */
    public function getDates()
    {
        return $this->_dates;
    }
    
    /**
    * GetDuration
    *
    * @return string Duration
    */
    public function getDuration()
    {
        return $this->_duration;
    }
}