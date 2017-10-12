<?php
namespace AssertChain;

use PHPUnit\Runner\Version;

/**
 * Class Container
 *
 * @package AssertChain
 */
class Container
{
    const ASSERT_CLASS = '\\PHPUnit\\Framework\\Assert';

    /**
     * @param $funcName
     * @throws \BadMethodCallException
     */
    protected function validateCallable($funcName)
    {
        if (! is_callable([self::ASSERT_CLASS, $funcName])) {
            $m = $funcName . ' is not found in ' . self::ASSERT_CLASS . '. your phpunit version is ' . Version::id();
            throw new \BadMethodCallException($m);
        }
    }
}
