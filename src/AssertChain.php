<?php
namespace AssertChain;

use AssertChain\Container\Aggregater;

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
    public function assert($actual)
    {
        return Aggregater::getInstance($actual);
    }
}