<?php
/**
* PremierLeagueSuspensions Test
*
* PHP version 5
*
* @category PremierLeagueSuspensionsTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* PremierLeagueSuspensions Test
*
* PHP version 5
*
* @category PremierLeagueSuspensionsTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class PremierLeagueSuspensionsTest extends \PHPUnit_Framework_TestCase
{
    private $_test;
    /**
     * Test Setup
     *
     * @return void
     */
    public function setUp() 
    {
        $this->_test = new PremierLeagueSuspensions();
        $this->_test->getPLSuspensions();
    }
    
    /**
     * Test Teardown
     *
     * @return void
     */
    public function tearDown() 
    {
        unset($this->_test);
    }
    
    /**
     * Test Player Name in getPLSuspensions
     *
     * @return void
     */
    public function testPlayerName() 
    {
        $res     = $this->_test->getPlayerName();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
    
    /**
     * Test Club Name in getPLSuspensions
     *
     * @return void
     */
    public function testClubName() 
    {
        $res     = $this->_test->getClubName();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
    
    /**
     * Test Dates in getPLSuspensions
     *
     * @return void
     */
    public function testDates() 
    {
        $res     = $this->_test->getDates();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
    
    /**
     * Test Duration in getPLSuspensions
     *
     * @return void
     */
    public function testDuration() 
    {
        $res     = $this->_test->getDuration();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
}