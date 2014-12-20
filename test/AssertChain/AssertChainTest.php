<?php
namespace AssertChain;

/**
 * Class AssertChainTest
 * @package AssertChain
 */
class AssertChainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function first()
    {
        $a = new AssertChain();
        $this->assertTrue($a->first());
    }
}
