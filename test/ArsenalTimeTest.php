<?php

use \PHPUnit\Framework\TestCase;

class ArsenalTimeTest extends TestCase
{
    /**
     * Instance variable
     *
     * @var ArsenalTime
     */
    private $_test;

    /**
     * Test Setup
     *
     * @return void
     */
    protected function setUp() : void
    {
        $this->_test = new ArsenalTime();
        $this->_test->getArsenalTime();
    }

    /**
     * Test Teardown
     *
     * @return void
     */
    protected function tearDown() : void
    {
        unset($this->_test);
    }

    /**
     * Test Game Time in getArsenalTime
     *
     * @return void
     */
    public function testGameTime() : void
    {
        $res     = $this->_test->getGameTime();
        $pattern = '/\d\d:\d\d/';
        $this->assertMatchesRegularExpression($pattern, $res, 'Regexp missmatch');
    }

    /**
     * Test Game Date in getArsenalTime
     *
     * @return void
     */
    public function testGameDate() : void
    {
        $res     = $this->_test->getGameDate();
        $pattern = '/\w* \w* \d*/';
        $this->assertMatchesRegularExpression($pattern, $res, 'Regexp missmatch');
    }

    /**
     * Test AwayTeam in getArsenalTime
     *
     * @return void
     */
    public function testVersusTeam() : void
    {
        $res     = $this->_test->getVersusTeam();
        $pattern = '/^([a-ú ,.\'-]+)$/i';
        $this->assertMatchesRegularExpression($pattern, $res, 'Regexp missmatch');
    }
}
