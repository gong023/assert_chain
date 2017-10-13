<?php
namespace AssertChain;

/**
 * Class Container
 *
 * @package AssertChain
 */
class Container
{
    const ASSERT_CLASS = '\\PHPUnit\\Framework\\Assert';

    /**
     * Returns the version of PHPUnit.
     *
     * @return string
     */
    private function getPHPUnitVersion()
    {
        if (class_exists('\\PHPUnit\\Runner\\Version')) {
            return \PHPUnit\Runner\Version::id();
        } else {
            return \PHPUnit_Runner_Version::id();
        }
    }
    /**
     * @param $funcName
     * @throws \BadMethodCallException
     */
    protected function validateCallable($funcName)
    {
        if (! is_callable([self::ASSERT_CLASS, $funcName])) {
            $m = $funcName . ' is not found in ' . self::ASSERT_CLASS . '. your phpunit version is ' . $this->getPHPUnitVersion();
            throw new \BadMethodCallException($m);
        }
    }
}
