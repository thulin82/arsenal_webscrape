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
        $this->_test->getPlSuspensions();
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
    public function testSuspensionItems() 
    {
        $res1     = $this->_test->getPlayerName();
        $pattern1 = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res1 as $value) {
            $this->assertRegExp($pattern1, $value, 'Regexp missmatch');
        }
        $res2     = $this->_test->getClubName();
        $pattern2 = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res2 as $value) {
            $this->assertRegExp($pattern2, $value, 'Regexp missmatch');
        }
        $res3     = $this->_test->getDates();
        $pattern3 = '/\d{2}.\d{2}.\d{4}/';
        foreach ($res3 as $value) {
            $this->assertRegExp($pattern3, $value, 'Regexp missmatch');
        }
        $res4     = $this->_test->getDuration();
        $pattern4 = '/\d{1}/';
        foreach ($res4 as $value) {
            $this->assertRegExp($pattern4, $value, 'Regexp missmatch');
        }
    }
    
}