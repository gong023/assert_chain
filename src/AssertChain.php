<?php
namespace AssertChain;

/**
 * Class AssertChain
 * @package AssertChain
 */
class AssertChain extends \PHPUnit_Framework_TestCase
{
    static $asserts = [];

    use AssertTrait;

    /**
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        self::defineAssert('testAssert', function() {
            return true;
        });
    }
}

