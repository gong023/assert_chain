<?php
namespace AssertChain;

/**
 * Class AssertChainTest
 * @package AssertChain
 */
class AssertChainTest extends AssertChain
{
    /**
     * @test
     */
    public function first()
    {
        $a = new AssertChain();

        $this->assertTrue($a->testAssert());
    }
}
