<?php
namespace AssertChain;

/**
 * Class Container
 * @package AssertChain
 */
class Container extends \PHPUnit_Framework_Assert
{
    /**
     * @var Container|null
     */
    private static $instance = null;

    /**
     * @var mixed
     */
    private $actual;

    /**
     * @param mixed $actual
     */
    private function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * @param mixed $actual
     * @return Container
     */
    public static function getInstance($actual)
    {
        if (! is_null(self::$instance)) {
            return self::$instance;
        }

        self::$instance = new Container($actual);

        return self::$instance;
    }
}
