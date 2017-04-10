<?php
/**
* ArsenalContracts
*
* PHP version 5
*
* @category ArsenalContracts
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* ArsenalContracts
*
* PHP version 5
*
* @category ArsenalContracts
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class ArsenalContracts
{
    const URL_CONTRACTS = 'http://www.transfermarkt.co.uk/jumplist/kader/verein/11';

    private $_ch;
    private $_contractEnds;
    private $_playerName;

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
        curl_setopt(
            $this->_ch, CURLOPT_USERAGENT,
            'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0'
        );
    }

    /**
    * Destructor
    */
    public function __destruct()
    {
        curl_close($this->_ch);
    }

    /**
    * GetArsenalContracts
    *
    * @return void
    */
    public function getArsenalContracts()
    {

        curl_setopt($this->_ch, CURLOPT_URL, self::URL_CONTRACTS);
        $html = curl_exec($this->_ch);
        preg_match_all(
            '/<td class="zentriert">(\d\d.\d\d.\d\d\d\d)<\/td>/', $html, $matches
        );
        preg_match_all('/alt="(.* .*)" class="bilder/', $html, $matches2);
        $this->_contractEnds = $matches[1];
        $this->_playerName   = $matches2[1];
    }
    
    /**
    * GetContractEnds
    *
    * @return array<String> Dates
    */
    public function getContractEnds()
    {
        return $this->_contractEnds;
    }

    /**
    * GetPlayerName
    *
    * @return array<String> Names
    */
    public function getPlayerName()
    {
        return $this->_playerName;
    }
}
