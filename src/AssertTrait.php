<?php
namespace AssertChain;

trait AssertTrait
{
    public static function defineAssert($name, $fn)
    {
        self::$asserts[$name] = $fn;
    }

    function __call($method, $arg)
    {
        $fn = self::$asserts[$method]->bindTo($this);

       return call_user_func_array($fn, $arg);
    }
}
