<?php
namespace AssertChain;

use AssertChain\Container\Aggregater;
use AssertChain\Container\Proxy;

/**
 * Class AssertChain
 * @package AssertChain
 */
trait AssertChain
{
    /**
     * @param mixed $actual
     * @return Aggregater
     */
    public function centralizedAssert($actual)
    {
        return Aggregater::getInstance($actual);
    }

    /**
     * @return Proxy
     */
    public function assert()
    {
        return new Proxy();
    }
}