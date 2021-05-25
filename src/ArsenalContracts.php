<?php

class ArsenalContracts
{
    /**
     * Contract Expiration Date
     *
     * @var string
     */
    private $_contractEnds;

    /**
     * Player Name
     *
     * @var string
     */
    private $_playerName;

    /**
     * Scrape the contract data from transfermarkt
     *
     * @return void
     */
    public function getArsenalContracts() :  void
    {
        $names_array = array();
        $dates_array = array();

        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get('https://www.transfermarkt.co.uk/jumplist/kader/verein/11');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();
        $doc->loadHTML($htmlString);
        $xpath = new DOMXPath($doc);

        $playerData = $xpath->evaluate('//span[@class="hide-for-small"]');

        foreach ($playerData as $d) {
            $names_array[] = $d->textContent;
        }

        $contractData = $xpath->evaluate('/html[1]/body[1]/div[2]/div[11]/div[1]/div[1]/div[4]/div[1]/table[1]/tbody[1]/tr/td[5]');

        foreach ($contractData as $d) {
            $dates_array[] = $d->textContent;
        }

        $this->_contractEnds = $dates_array;
        $this->_playerName   = $names_array;
    }
    
    /**
     * GetContractEnds
     *
     * @return array<String> Dates
     */
    public function getContractEnds() : array
    {
        return $this->_contractEnds;
    }

    /**
     * GetPlayerName
     *
     * @return array<String> Names
     */
    public function getPlayerName() : array
    {
        return $this->_playerName;
    }
}
