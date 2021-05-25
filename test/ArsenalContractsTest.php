<?php

use PHPUnit\Framework\TestCase;

class ArsenalContractsTest extends TestCase
{
    /**
     * Instance variable
     *
     * @var ArsenalContracts
     */
    private $_test;

    /**
     * Test Setup
     *
     * @return void
     */
    protected function setUp() : void
    {
        $this->_test = new ArsenalContracts();
        $this->_test->getArsenalContracts();
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
     * Test Contract Ends in getArsenalContracts
     *
     * @return void
     */
    public function testContractEnds() : void
    {
        $res     = $this->_test->getContractEnds();
        $pattern = '/([a-z]{3} \d{2}, \d{4})/i';
        foreach ($res as $value) {
            $this->assertMatchesRegularExpression($pattern, $value, 'Regexp missmatch');
        }
    }

    /**
     * Test Player Names in getArsenalContracts
     *
     * @return void
     */
    public function testPlayerNames() : void
    {
        $res     = $this->_test->getPlayerName();
        $pattern = '/^([a-ú ,.\'-]+)$/i';
        foreach ($res as $value) {
            $this->assertMatchesRegularExpression($pattern, $value, 'Regexp missmatch');
        }
    }
}
