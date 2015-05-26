<?php
/**
* ArsenalTime
*
* PHP version 5
*
* @category ArsenalTime
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* ArsenalTime
*
* PHP version 5
*
* @category ArsenalTime
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class ArsenalTime
{
    const URL_ARSENAL_TIME = 'www.arsenal.com/fixtures/first-team';

    private $_gameTime;
    private $_ch;
    private $_homeTeam;
    private $_awayTeam;

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
    * GetArsenalTime
    *
    * @return void
    */
    public function getArsenalTime()
    {

        curl_setopt($this->_ch, CURLOPT_URL, self::URL_ARSENAL_TIME);
        $html = curl_exec($this->_ch);
        preg_match('/data-next-fixture-time="(\d*)/', $html, $matches1);
        preg_match('/<td class="right club-name">(.*)<\/td>/', $html, $matches2);
        preg_match('/<td class="left club-name">(.*)<\/td>/', $html, $matches3);
        $this->_gameTime = $matches1[1];
        $this->_homeTeam = $matches2[1];
        $this->_awayTeam = $matches3[1];
    }

    /**
    * GetGameTime
    *
    * @return string Game Time
    */
    public function getGameTime()
    {
        return $this->_gameTime;
    }

    /**
    * GetHomeTeam
    *
    * @return string Home Team
    */
    public function getHomeTeam()
    {
        return $this->_homeTeam;
    }
    
    /**
    * GetAwayTeam
    *
    * @return string Away Team
    */
    public function getAwayTeam()
    {
        return $this->_awayTeam;
    }
}