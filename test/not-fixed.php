<?php

use PHPUnit\Framework\TestCase;

class PremierLeagueSuspensionsTest extends TestCase
{
    /**
     * Instance variable
     *
     * @var PremierLeagueSuspensions
     */
    private $_test;

    /**
     * Test Setup
     *
     * @return void
     */
    protected function setUp() : void
    {
        $this->_test = new PremierLeagueSuspensions();
        $this->_test->getPlSuspensions();
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
     * Test Player Name in getPLSuspensions
     *
     * @return void
     */
    public function testSuspensionItems() : void
    {
        $res1     = $this->_test->getPlayerName();
        $pattern1 = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res1 as $value) {
            $this->assertMatchesRegularExpression($pattern1, $value, 'Regexp missmatch');
        }
        $res2     = $this->_test->getClubName();
        $pattern2 = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res2 as $value) {
            $this->assertMatchesRegularExpression($pattern2, $value, 'Regexp missmatch');
        }
        $res3     = $this->_test->getDates();
        $pattern3 = '/\d{2}.\d{2}.\d{4}/';
        foreach ($res3 as $value) {
            $this->assertMatchesRegularExpression($pattern3, $value, 'Regexp missmatch');
        }
        $res4     = $this->_test->getDuration();
        $pattern4 = '/\d{1}/';
        foreach ($res4 as $value) {
            $this->assertMatchesRegularExpression($pattern4, $value, 'Regexp missmatch');
        }
    }
}
