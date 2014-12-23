<?php
namespace AssertChain;

/**
 * Class Container
 *
 * @package AssertChain
 */
class Container
{
    const ASSERT_CLASS = '\PHPUnit_Framework_Assert';

    /**
     * @param $funcName
     * @throws \BadMethodCallException
     */
    protected function validateCallable($funcName)
    {
        if (! is_callable([self::ASSERT_CLASS, $funcName])) {
            $m = $funcName . ' is not found in ' . self::ASSERT_CLASS . '. your phpunit version is ' . \PHPUnit_Runner_Version::id();
            throw new \BadMethodCallException($m);
        }
    }
}
