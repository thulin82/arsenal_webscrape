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
    /**
     * Test Game Time in getArsenalTime
     *
     * @return void
     */
    public function testGameTime() 
    {
        $test = new ArsenalTime();
        $test->getArsenalTime();
        $res     = $test->getGameTime();
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
        $test = new ArsenalTime();
        $test->getArsenalTime();
        $res     = $test->getHomeTeam();
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
        $test = new ArsenalTime();
        $test->getArsenalTime();
        $res     = $test->getAwayTeam();    
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        $this->assertRegExp($pattern, $res, 'Regexp missmatch');
    }
}