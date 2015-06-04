<?php
/**
* ArsenalContracts Test
*
* PHP version 5
*
* @category ArsenalContractsTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
/**
* ArsenalContracts Test
*
* PHP version 5
*
* @category ArsenalContractsTest
* @package  Arsenal_Webscrape
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/arsenal_webscrape
*/
class ArsenalContractsTest extends \PHPUnit_Framework_TestCase
{
    private $_test;
    /**
     * Test Setup
     *
     * @return void
     */
    public function setUp() 
    {
        $this->_test = new ArsenalContracts();
        $this->_test->getArsenalContracts();
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
     * Test Contract Ends in getArsenalContracts
     *
     * @return void
     */
    public function testContractEnds() 
    {
        $res     = $this->_test->getContractEnds();
        $pattern = '/\d{2}.\d{2}.\d{4}/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
    
    /**
     * Test Player Names in getArsenalContracts
     *
     * @return void
     */
    public function testPlayerNames() 
    {
        $res     = $this->_test->getPlayerName();
        $pattern = '/^(\w+|\w+ \w+|\w+ \w+ \w+)$/';
        foreach ($res as $value) {
            $this->assertRegExp($pattern, $value, 'Regexp missmatch');
        }
    }
}