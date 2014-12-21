<?php
namespace AssertChain;

/**
 * Class AssertChain
 * @package AssertChain
 */
trait AssertChain
{
    /**
     * @param mixed $actual
     * @return Container
     */
    public function assert($actual)
    {
        return Container::getInstance($actual);
    }
}