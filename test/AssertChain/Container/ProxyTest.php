<?php
namespace AssertChain\Container\Test;

use AssertChain\AssertChain;

/**
 * Class ProxyTest
 *
 * @package AssertChain\Container\Test
 */
class ProxyTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    public function testWithArray()
    {
        $arr = [
            'key' => 'value',
        ];

        $this->assert()
            ->arrayHasKey('key', $arr)
            ->true(true)
            ->same(0, 0);
    }
}