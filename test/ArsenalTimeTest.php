<?php
/**
* ArsenalTime Test
*
* PHP version 5
*
* @category ArsenalTimeTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* ArsenalTime Test
*
* PHP version 5
*
* @category ArsenalTimeTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class ArsenalTimeTest extends \PHPUnit_Framework_TestCase
{
    private $_test;
    /**
     * Test Setup
     *
     * @return void
     */
    public function setUp() 
    {
        $this->_test = new ArsenalTime();
        $this->_test->getArsenalTime();
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
     * Test Game Time in getArsenalTime
     *
     * @return void
     */
    public function testGameTime() 
    {
        $res     = $this->_test->getGameTime();
        $pattern = '/\d{10}/';
        $this->assertRegExp($pattern, $res, 'Regexp missmatch');
    }
    
    /**
     * Test Home Team in getArsenalTime
     *
     * @return void
     */
    public function testHomeTeam() 
    {
        $res     = $this->_test->getHomeTeam();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        $this->assertRegExp($pattern, $res, 'Regexp missmatch');
    }
    
    /**
     * Test AwayTeam in getArsenalTime
     *
     * @return void
     */
    public function testAwayTeam() 
    {
        $res     = $this->_test->getAwayTeam();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        $this->assertRegExp($pattern, $res, 'Regexp missmatch');
    }
}