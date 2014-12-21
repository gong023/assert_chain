<?php
namespace AssertChain;

class AssertChainTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    /**
     * @test
     */
    public function assertReturnContainer()
    {
        $this->assertInstanceOf('\AssertChain\Container', $this->assert('some value'));
    }
}