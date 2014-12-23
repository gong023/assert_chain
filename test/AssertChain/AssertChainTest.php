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

    public function testArray()
    {
        $this->assert(['key' => 'value'])
            ->notNull()
            ->notCount(0)
            ->notEmpty()
            ->count(1)
            ->arrayHasKey('key')
            ->equals(['key' => 'value']);
    }
}