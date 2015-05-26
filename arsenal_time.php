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

    private $_game_time;
    private $_ch;
    private $_home_team;
    private $_away_team;

    /**
    * Constructor
    *
    * Initialize Curl and set a few options
    */
    public function __construct()
    {
        date_default_timezone_set("Europe/Stockholm");
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
    * @return -
    */
    public function getArsenalTime()
    {

        curl_setopt($this->_ch, CURLOPT_URL, self::URL_ARSENAL_TIME);
        $html = curl_exec($this->_ch);
        preg_match('/data-next-fixture-time="(\d*)/', $html, $matches1);
        preg_match('/<td class="right club-name">(.*)<\/td>/', $html, $matches2);
        preg_match('/<td class="left club-name">(.*)<\/td>/', $html, $matches3);
        $this->_game_time = $matches1[1];
        $this->_home_team = $matches2[1];
        $this->_away_team = $matches3[1];
    }

    /**
    * GetGameTime
    *
    * @return string Game Time
    */
    public function getGameTime()
    {
        return $this->_game_time;
    }

    /**
    * GetHomeTeam
    *
    * @return string Home Team
    */
    public function getHomeTeam()
    {
        return $this->_home_team;
    }
    
    /**
    * GetAwayTeam
    *
    * @return string Away Team
    */
    public function getAwayTeam()
    {
        return $this->_away_team;
    }
}
?>
