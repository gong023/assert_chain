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
            'intKey'    => 1,
            'stringKey' => 'foo',
            'boolKey'   => true,
        ];

        $this->assert()
            ->notEmpty($arr)
            ->arrayHasKey('intKey', $arr)
            ->same(1, $arr['intKey'])
            ->arrayHasKey('stringKey', $arr)
            ->same('foo', $arr['stringKey'])
            ->arrayHasKey('boolKey', $arr)
            ->true($arr['boolKey']);
    }
}