<?php

class ArsenalTime
{
    /**
     * Game Time
     *
     * @var string
     */
    private $_gameTime;

    /**
     * Game Date
     *
     * @var string
     */
    private $_gameDate;

    /**
     * Versus Team
     *
     * @var string
     */
    private $_versusTeam;

    /**
     * Scrape the data for next game from arsenal.com
     *
     * @return void
     */
    public function getArsenalTime() : void
    {
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get('https://www.arsenal.com');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();
        $doc->loadHTML($htmlString);
        $xpath = new DOMXPath($doc);

        $matchData = $xpath->evaluate('//article[@id="block-views-block-fixtures-page-block-4"]/div/header/h3');
        preg_match('/(\w*) - (\w* \w* \d*) - (\d\d:\d\d)/', $matchData[0]->textContent, $matches);

        $this->_versusTeam = $matches[1];
        $this->_gameDate = $matches[2];
        $this->_gameTime = $matches[3];
    }

    /**
     * GetGameTime
     *
     * @return string Game Time
     */
    public function getGameTime() : string
    {
        return $this->_gameTime;
    }

    /**
     * GetGameDate
     *
     * @return string Game Date
     */
    public function getGameDate() : string
    {
        return $this->_gameDate;
    }
    
    /**
     * GetVersusTeam
     *
     * @return string Versus Team
     */
    public function getVersusTeam() : string
    {
        return $this->_versusTeam;
    }
}
