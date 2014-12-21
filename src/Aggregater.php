<?php
namespace AssertChain;

/**
 * Class Aggregater
 * @package AssertChain
 */
class Aggregater
{
    const ASSERT_CLASS = '\PHPUnit_Framework_Assert';

    /**
     * @var Aggregater|null
     */
    private static $instance = null;

    /**
     * @var mixed
     */
    private static $actual = null;

    /**
     * @param mixed $actual
     */
    private function __construct($actual)
    {
        self::$actual = $actual;
    }

    /**
     * @param mixed $actual
     * @return Aggregater
     */
    public static function getInstance($actual)
    {
        if (! is_null(self::$instance) && ! is_null(self::$actual) && self::$actual === $actual) {
            return self::$instance;
        }

        self::$instance = new Aggregater($actual);

        return self::$instance;
    }

    /**
     * @param mixed  $key
     * @param string $message
     * @return $this
     */
    public function arrayHasKey($key, $message = '')
    {
        $this->validateCallable(__FUNCTION__);
        forward_static_call_array([self::ASSERT_CLASS, 'assertArrayHasKey'], [$key, self::$actual, $message]);

        return $this;
    }

    /**
     * @param $funcName
     * @throws AssertChainFunctionNotExistException
     */
    public function validateCallable($funcName)
    {
        if (! is_callable([self::ASSERT_CLASS, $funcName])) {
            $m = $funcName . ' is not found in ' . self::ASSERT_CLASS . '. your phpunit version is ' . \PHPUnit_Runner_Version::id();
            throw new AssertChainFunctionNotExistException($m);
        }
    }
}
