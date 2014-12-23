<?php
namespace AssertChain\Container;


use AssertChain\Container;

/**
 * Class Proxy
 *
 * @package AssertChain\Container
 *
 * @method \AssertChain\Container\Proxy arrayHasKey($key, $array, $message = '')
 */
class Proxy extends Container
{
    public function __call($method, $args)
    {
        switch($method) {
            case 'arrayHasKey':
                $method = 'assert' . ucfirst($method);
                break;
        }

        try {
            $this->validateCallable($method);
        } catch (\BadMethodCallException $e) {
            $method = 'assert' . ucfirst($method);
            $this->validateCallable($method);
        }

        forward_static_call_array([self::ASSERT_CLASS, $method], $args);

        return $this;
    }
}
