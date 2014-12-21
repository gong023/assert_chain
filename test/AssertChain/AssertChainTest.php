<?php
namespace AssertChain;

class AssertChainTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    /**
     * @test
     */
    public function assertReturnAggregater()
    {
        $this->assertInstanceOf('\AssertChain\Aggregater', $this->assert('some value'));
    }

    public function testArrayHasKey()
    {
        $this->assert(['key' => 'value'])
            ->arrayHasKey('key')
            ->arrayHasKey('key');
    }
}