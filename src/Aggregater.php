<?php
namespace AssertChain;
use ArrayAccess;
use Countable;
use DOMElement;
use Traversable;

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

    /**
     * @param mixed  $key
     * @param string $message
     * @return $this
     * @throws AssertChainFunctionNotExistException
     */
    public function arrayHasKey($key, $message = '')
    {
        $this->validateCallable('assertArrayHasKey');
        forward_static_call_array([self::ASSERT_CLASS, 'assertArrayHasKey'], [$key, self::$actual, $message]);

        return $this;
    }

    /**
     * @param array|ArrayAccess $subset
     * @param bool              $strict
     * @param string            $message
     * @return $this
     * @throws AssertChainFunctionNotExistException
     */
    public function arraySubSet($subset, $strict = false, $message = '')
    {
        $this->validateCallable('assertArraySubset');
        forward_static_call_array([self::ASSERT_CLASS, 'assertArraySubset'], [$subset, self::$actual, $strict, $message]);

        return $this;
    }

    /**
     * @param mixed  $key
     * @param string $message
     * @return $this
     * @throws AssertChainFunctionNotExistException
     */
    public function arrayNotHasKey($key, $message = '')
    {
        $this->validateCallable('assertArrayNotHasKey');
        forward_static_call_array([self::ASSERT_CLASS, 'assertArrayNotHasKey'], [$key, self::$actual, $message]);

        return $this;
    }

    /**
     * @param mixed   $needle
     * @param string  $message
     * @param boolean $ignoreCase
     * @param boolean $checkForObjectIdentity
     * @param boolean $checkForNonObjectIdentity
     * @return $this
     */
    public function contains($needle, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        $this->validateCallable('assertContains');
        forward_static_call_array([self::ASSERT_CLASS, 'assertContains'], [$needle, self::$actual, $message, $ignoreCase, $checkForObjectIdentity, $checkForNonObjectIdentity]);

        return $this;
    }

    /**
     * @param mixed   $needle
     * @param string  $haystackAttributeName
     * @param string  $message
     * @param boolean $ignoreCase
     * @param boolean $checkForObjectIdentity
     * @param boolean $checkForNonObjectIdentity
     * @return $this
     */
    public function attributeContains($needle, $haystackAttributeName, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        $this->validateCallable('assertAttributeContains');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeContains'], [$needle, $haystackAttributeName, self::$actual, $message, $ignoreCase, $checkForObjectIdentity, $checkForNonObjectIdentity]);

        return $this;
    }

    /**
     * Asserts that a haystack does not contain a needle.
     *
     * @param mixed   $needle
     * @param string  $message
     * @param boolean $ignoreCase
     * @param boolean $checkForObjectIdentity
     * @param boolean $checkForNonObjectIdentity
     * @return $this
     */
    public function notContains($needle, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        $this->validateCallable('assertNotContains');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotContains'], [$needle, self::$actual, $message, $ignoreCase, $checkForObjectIdentity, $checkForNonObjectIdentity]);

        return $this;
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain a needle.
     *
     * @param mixed   $needle
     * @param string  $haystackAttributeName
     * @param string  $message
     * @param boolean $ignoreCase
     * @param boolean $checkForObjectIdentity
     * @param boolean $checkForNonObjectIdentity
     * @return $this
     */
    public function attributeNotContains($needle, $haystackAttributeName,  $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        $this->validateCallable('assertAttributeNotContains');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotContains'], [$needle, $haystackAttributeName, self::$actual, $message, $ignoreCase, $checkForObjectIdentity, $checkForNonObjectIdentity]);

        return $this;
    }

    /**
     * Asserts that a haystack contains only values of a given type.
     *
     * @param string  $type
     * @param boolean $isNativeType
     * @param string  $message
     * @since  Method available since Release 3.1.4
     * @return $this
     */
    public function containsOnly($type, $isNativeType = null, $message = '')
    {
        $this->validateCallable('assertContainsOnly');
        forward_static_call_array([self::ASSERT_CLASS, 'assertContainsOnly'], [$type, self::$actual, $isNativeType, $message]);

        return $this;
    }

    /**
     * Asserts that a haystack contains only instances of a given classname
     *
     * @param string $classname
     * @param string $message
     * @return $this
     */
    public function containsOnlyInstancesOf($classname, $message = '')
    {
        $this->validateCallable('assertContainsOnlyInstancesOf');
        forward_static_call_array([self::ASSERT_CLASS, 'assertContainsOnlyInstancesOf'], [$classname, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains only values of a given type.
     *
     * @param string  $type
     * @param string  $haystackAttributeName
     * @param boolean $isNativeType
     * @param string  $message
     * @return $this
     */
    public function attributeContainsOnly($type, $haystackAttributeName, $isNativeType = null, $message = '')
    {
        $this->validateCallable('assertAttributeContainsOnly');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeContainsOnly'], [$type, $haystackAttributeName, self::$actual, $isNativeType, $message]);

        return $this;
    }

    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
     * @param string  $type
     * @param boolean $isNativeType
     * @param string  $message
     * @return $this
     */
    public function notContainsOnly($type, $isNativeType = null, $message = '')
    {
        $this->validateCallable('assertNotContainsOnly');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotContainsOnly'], [$type, self::$actual, $isNativeType, $message]);

        return $this;
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain only values of a given
     * type.
     *
     * @param string  $type
     * @param string  $haystackAttributeName
     * @param boolean $isNativeType
     * @param string  $message
     * @return $this
     */
    public function attributeNotContainsOnly($type, $haystackAttributeName, $isNativeType = null, $message = '')
    {
        $this->validateCallable('assertAttributeNotContainsOnly');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotContainsOnly'], [$type, $haystackAttributeName, self::$actual, $isNativeType, $message]);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param integer $expectedCount
     * @param string  $message
     * @return $this
     */
    public function count($expectedCount, $message = '')
    {
        $this->validateCallable('assertCount');
        forward_static_call_array([self::ASSERT_CLASS, 'assertCount'], [$expectedCount, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param integer $expectedCount
     * @param string  $haystackAttributeName
     * @param string  $message
     * @return $this
     */
    public function attributeCount($expectedCount, $haystackAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeCount');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeCount'], [$expectedCount, $haystackAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param integer $expectedCount
     * @param string  $message
     * @return $this
     */
    public function notCount($expectedCount, $message = '')
    {
        $this->validateCallable('assertNotCount');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotCount'], [$expectedCount, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param integer $expectedCount
     * @param string  $haystackAttributeName
     * @param string  $message
     * @return $this
     */
    public function attributeNotCount($expectedCount, $haystackAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeNotCount');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotCount'], [$expectedCount, $haystackAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two variables are equal.
     *
     * @param mixed   $expected
     * @param string  $message
     * @param float   $delta
     * @param integer $maxDepth
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function equals($expected, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertEquals'], [$expected, self::$actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that a variable is equal to an attribute of an object.
     *
     * @param mixed   $expected
     * @param string  $actualAttributeName
     * @param string  $message
     * @param float   $delta
     * @param integer $maxDepth
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function attributeEquals($expected, $actualAttributeName, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertAttributeEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeEquals'], [$expected, $actualAttributeName, self::$actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that two variables are not equal.
     *
     * @param mixed   $expected
     * @param string  $message
     * @param float   $delta
     * @param integer $maxDepth
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function notEquals($expected, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertNotEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotEquals'], [$expected, self::$actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that a variable is not equal to an attribute of an object.
     *
     * @param mixed   $expected
     * @param string  $actualAttributeName
     * @param string  $message
     * @param float   $delta
     * @param integer $maxDepth
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function attributeNotEquals($expected, $actualAttributeName, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertAttributeNotEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotEquals'], [$expected, $actualAttributeName, self::$actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that a variable is empty.
     * Impossible to define 'empty' function
     *
     * @param string $message
     * @return $this
     */
    public function beEmpty($message = '')
    {
        $this->validateCallable('assertEmpty');
        forward_static_call_array([self::ASSERT_CLASS, 'assertEmpty'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is empty.
     *
     * @param string $haystackAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeEmpty($haystackAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeEmpty');
        forward_static_call_array([self::ASSERT_CLASS, 'assertEmpty'], [$haystackAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is not empty.
     *
     * @param  string $message
     * @return $this
     */
    public function notEmpty($message = '')
    {
        $this->validateCallable('assertNotEmpty');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotEmpty'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is not empty.
     *
     * @param string $haystackAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeNotEmpty($haystackAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeNotEmpty');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotEmpty'], [$haystackAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a value is greater than another value.
     *
     * @param mixed  $expected
     * @param string $message
     * @return $this
     */
    public function greaterThan($expected, $message = '')
    {
        $this->validateCallable('assertGreaterThan');
        forward_static_call_array([self::ASSERT_CLASS, 'assertGreaterThan'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is greater than another value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeGreaterThan($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeGreaterThan');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeGreaterThan'], [$expected, $actualAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a value is greater than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     * @since  Method available since Release 3.1.0
     * @return $this
     */
    public function greaterThanOrEqual($expected, $message = '')
    {
        $this->validateCallable('assertGreaterThanOrEqual');
        forward_static_call_array([self::ASSERT_CLASS, 'assertGreaterThanOrEqual'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is greater than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeGreaterThanOrEqual($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeGreaterThanOrEqual');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeGreaterThanOrEqual'], [$expected,  $actualAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a value is smaller than another value.
     *
     * @param mixed  $expected
     * @param string $message
     * @return $this
     */
    public function lessThan($expected, $message = '')
    {
        $this->validateCallable('assertLessThan');
        forward_static_call_array([self::ASSERT_CLASS, 'assertLessThan'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is smaller than another value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeLessThan($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeLessThan');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeLessThan'], [$expected, $actualAttributeName, $message]);

        return $this;
    }

    /**
     * Asserts that a value is smaller than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     * @return $this
     */
    public function lessThanOrEqual($expected, $message = '')
    {
        $this->validateCallable('assertLessThanOrEqual');
        forward_static_call_array([self::ASSERT_CLASS, 'assertLessThanOrEqual'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is smaller than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeLessThanOrEqual($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeLessThanOrEqual');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeLessThanOrEqual'], [$expected, $actualAttributeName, $message]);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
     * @param string  $expected
     * @param string  $message
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @since  Method available since Release 3.2.14
     * @return $this
     */
    public function fileEquals($expected, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertFileEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertFileEquals'], [$expected, self::$actual, $message, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
     * @param string  $expected
     * @param string  $message
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function fileNotEquals($expected, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertFileNotEquals');
        forward_static_call_array([self::ASSERT_CLASS, 'assertFileNotEquals'], [$expected, self::$actual, $message, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
     * @param string  $expectedFile
     * @param string  $message
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @since  Method available since Release 3.3.0
     * @return $this
     */
    public function stringEqualsFile($expectedFile, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertStringEqualsFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringEqualsFile'], [$expectedFile, self::$actual, $message, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
     * @param string  $expectedFile
     * @param string  $message
     * @param boolean $canonicalize
     * @param boolean $ignoreCase
     * @return $this
     */
    public function stringNotEqualsFile($expectedFile, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        $this->validateCallable('assertStringNotEqualsFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringNotEqualsFile'], [$expectedFile, self::$actual, $message, $canonicalize, $ignoreCase]);

        return $this;
    }

    /**
     * Asserts that a file exists.
     *
     * @param string $filename
     * @param string $message
     * @return $this
     */
    public function fileExists($filename, $message = '')
    {
        $this->validateCallable('assertFileExists');
        forward_static_call_array([self::ASSERT_CLASS, 'assertFileExists'], [$filename, $message]);

        return $this;
    }

    /**
     * Asserts that a file does not exist.
     *
     * @param string $filename
     * @param string $message
     * @return $this
     */
    public function fileNotExists($filename, $message = '')
    {
        $this->validateCallable('assertFileNotExists');
        forward_static_call_array([self::ASSERT_CLASS, 'assertFileNotExists'], [$filename, $message]);

        return $this;
    }

    /**
     * Asserts that a condition is true.
     *
     * @param  string  $message
     * @return $this
     */
    public function true($message = '')
    {
        $this->validateCallable('assertTrue');
        forward_static_call_array([self::ASSERT_CLASS, 'assertTrue'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a condition is not true.
     *
     * @param  string $message
     * @return $this
     */
    public function notTrue($message = '')
    {
        $this->validateCallable('assertNotTrue');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotTrue'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a condition is false.
     *
     * @param  string $message
     * @return $this
     */
    public function false($message = '')
    {
        $this->validateCallable('assertFalse');
        forward_static_call_array([self::ASSERT_CLASS, 'assertFalse'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a condition is not false.
     *
     * @param  string $message
     * @return $this
     */
    public function notFalse($message = '')
    {
        $this->validateCallable('assertNotFalse');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotFalse'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is not null.
     *
     * @param string $message
     * @return $this
     */
    public function notNull($message = '')
    {
        $this->validateCallable('assertNotNull');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotNull'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is null.
     *
     * @param string $message
     * @return $this
     */
    public function null($message = '')
    {
        $this->validateCallable('assertNull');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNull'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a class has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function classHasAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertClassHasAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertClassHasAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a class does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function classNotHasAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertClassNotHasAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertClassNotHasAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a class has a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function classHasStaticAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertClassHasStaticAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertClassHasStaticAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a class does not have a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function classNotHasStaticAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertClassNotHasStaticAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertClassNotHasStaticAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an object has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function objectHasAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertObjectHasAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertObjectHasAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an object does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function objectNotHasAttribute($attributeName, $message = '')
    {
        $this->validateCallable('assertObjectNotHasAttribute');
        forward_static_call_array([self::ASSERT_CLASS, 'assertObjectNotHasAttribute'], [$attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
     * @param mixed  $expected
     * @param string $message
     * @return $this
     */
    public function same($expected, $message = '')
    {
        $this->validateCallable('assertSame');
        forward_static_call_array([self::ASSERT_CLASS, 'assertSame'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable and an attribute of an object have the same type
     * and value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeSame($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeSame');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeSame'], [$expected, $actualAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
     * @param mixed  $expected
     * @param string $message
     * @return $this
     */
    public function notSame($expected, $message = '')
    {
        $this->validateCallable('assertNotSame');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotSame'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable and an attribute of an object do not have the
     * same type and value.
     *
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $message
     * @return $this
     */
    public function attributeNotSame($expected, $actualAttributeName, $message = '')
    {
        $this->validateCallable('assertAttributeNotSame');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotSame'], [$expected, $actualAttributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is of a given type.
     *
     * @param string $expected
     * @param string $message
     * @return $this
     */
    public function beInstanceOf($expected, $message = '')
    {
        $this->validateCallable('assertInstanceOf');
        forward_static_call_array([self::ASSERT_CLASS, 'assertInstanceOf'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is of a given type.
     *
     * @param string $expected
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function attributeInstanceOf($expected, $attributeName, $message = '')
    {
        $this->validateCallable('assertAttributeInstanceOf');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeInstanceOf'], [$expected, $attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is not of a given type.
     *
     * @param string $expected
     * @param string $message
     * @return $this
     */
    public function notInstanceOf($expected, $message = '')
    {
        $this->validateCallable('assertNotInstanceOf');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotInstanceOf'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is of a given type.
     *
     * @param string $expected
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function attributeNotInstanceOf($expected, $attributeName, $message = '')
    {
        $this->validateCallable('assertAttributeNotInstanceOf');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotInstanceOf'], [$expected, $attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is of a given type.
     *
     * @param string $expected
     * @param string $message
     * @return $this
     */
    public function internalType($expected, $message = '')
    {
        $this->validateCallable('assertInternalType');
        forward_static_call_array([self::ASSERT_CLASS, 'assertInternalType'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is of a given type.
     *
     * @param string $expected
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function attributeInternalType($expected, $attributeName, $message = '')
    {
        $this->validateCallable('assertAttributeInternalType');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeInternalType'], [$expected, $attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a variable is not of a given type.
     *
     * @param string $expected
     * @param string $message
     * @return $this
     */
    public function notInternalType($expected, $message = '')
    {
        $this->validateCallable('assertNotInternalType');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotInternalType'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that an attribute is of a given type.
     *
     * @param string $expected
     * @param string $attributeName
     * @param string $message
     * @return $this
     */
    public function attributeNotInternalType($expected, $attributeName, $message = '')
    {
        $this->validateCallable('assertAttributeNotInternalType');
        forward_static_call_array([self::ASSERT_CLASS, 'assertAttributeNotInternalType'], [$expected, $attributeName, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     * @return $this
     */
    public function regExp($pattern, $message = '')
    {
        $this->validateCallable('assertRegExp');
        forward_static_call_array([self::ASSERT_CLASS, 'assertRegExp'], [$pattern, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     * @return $this
     */
    public function notRegExp($pattern, $message = '')
    {
        $this->validateCallable('assertNotRegExp');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotRegExp'], [$pattern, self::$actual, $message]);

        return $this;
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
     * @param array|Countable|Traversable $expected
     * @param string                      $message
     * @return $this
     */
    public function sameSize($expected, $message = '')
    {
        $this->validateCallable('assertSameSize');
        forward_static_call_array([self::ASSERT_CLASS, 'assertSameSize'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
     * @param array|Countable|Traversable $expected
     * @param string                      $message
     * @return $this
     */
    public function notSameSize($expected, $message = '')
    {
        $this->validateCallable('assertNotSameSize');
        forward_static_call_array([self::ASSERT_CLASS, 'assertNotSameSize'], [$expected, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string matches a given format string.
     *
     * @param string $format
     * @param string $message
     * @return $this
     */
    public function stringMatchesFormat($format, $message = '')
    {
        $this->validateCallable('assertStringMatchesFormat');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringMatchesFormat'], [$format, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string does not match a given format string.
     *
     * @param string $format
     * @param string $message
     * @return $this
     */
    public function stringNotMatchesFormat($format, $message = '')
    {
        $this->validateCallable('assertStringNotMatchesFormat');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringNotMatchesFormat'], [$format, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string matches a given format file.
     *
     * @param string $formatFile
     * @param string $message
     * @return $this
     */
    public function stringMatchesFormatFile($formatFile, $message = '')
    {
        $this->validateCallable('assertStringMatchesFormatFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringMatchesFormatFile'], [$formatFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string does not match a given format string.
     *
     * @param string $formatFile
     * @param string $message
     * @return $this
     */
    public function stringNotMatchesFormatFile($formatFile, $message = '')
    {
        $this->validateCallable('assertStringNotMatchesFormatFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringNotMatchesFormatFile'], [$formatFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string starts with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     * @return $this
     */
    public function stringStartsWith($prefix, $message = '')
    {
        $this->validateCallable('assertStringStartsWith');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringStartsWith'], [$prefix, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     * @return $this
     */
    public function stringStartsNotWith($prefix, $message = '')
    {
        $this->validateCallable('assertStringStartsNotWith');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringStartsNotWith'], [$prefix, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string ends with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     * @return $this
     */
    public function stringEndsWith($suffix, $message = '')
    {
        $this->validateCallable('assertStringEndsWith');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringEndsWith'], [$suffix, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string ends not with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     * @return $this
     */
    public function stringEndsNotWith($suffix, $message = '')
    {
        $this->validateCallable('assertStringEndsNotWith');
        forward_static_call_array([self::ASSERT_CLASS, 'assertStringEndsNotWith'], [$suffix, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function xmlFileEqualsXmlFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertXmlFileEqualsXmlFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlFileEqualsXmlFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function xmlFileNotEqualsXmlFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertXmlFileNotEqualsXmlFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlFileNotEqualsXmlFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML documents are equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function xmlStringEqualsXmlFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertXmlStringEqualsXmlFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlStringEqualsXmlFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML documents are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function xmlStringNotEqualsXmlFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertXmlStringNotEqualsXmlFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlStringNotEqualsXmlFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML documents are equal.
     *
     * @param string $expectedXml
     * @param string $message
     * @return $this
     */
    public function xmlStringEqualsXmlString($expectedXml, $message = '')
    {
        $this->validateCallable('assertXmlStringEqualsXmlString');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlStringEqualsXmlString'], [$expectedXml, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two XML documents are not equal.
     *
     * @param string $expectedXml
     * @param string $message
     * @return $this
     */
    public function xmlStringNotEqualsXmlString($expectedXml, $message = '')
    {
        $this->validateCallable('assertXmlStringNotEqualsXmlString');
        forward_static_call_array([self::ASSERT_CLASS, 'assertXmlStringNotEqualsXmlString'], [$expectedXml, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
     * @param DOMElement $expectedElement
     * @param boolean    $checkAttributes
     * @param string     $message
     * @return $this
     */
    public function equalXMLStructure(DOMElement $expectedElement, $checkAttributes = false, $message = '')
    {
        $this->validateCallable('assertEqualXMLStructure');
        forward_static_call_array([self::ASSERT_CLASS, 'assertEqualXMLStructure'], [$expectedElement, self::$actual, $checkAttributes, $message]);

        return $this;
    }

    /**
     * Evaluates a PHPUnit_Framework_Constraint matcher object.
     *
     * @param mixed  $value
     * @param string $message
     * @return $this
     */
    public function that($value, $message = '')
    {
        $this->validateCallable('assertThat');
        forward_static_call_array([self::ASSERT_CLASS, 'assertThat'], [$value, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
     * @param string $message
     * @return $this
     */
    public function json($message = '')
    {
        $this->validateCallable('assertJson');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJson'], [self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
     * @param string $expectedJson
     * @param string $message
     * @return $this
     */
    public function jsonStringEqualsJsonString($expectedJson, $message = '')
    {
        $this->validateCallable('assertJsonStringEqualsJsonString');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonStringEqualsJsonString'], [$expectedJson, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $message
     * @return $this
     */
    public function jsonStringNotEqualsJsonString($expectedJson, $message = '')
    {
        $this->validateCallable('assertJsonStringNotEqualsJsonString');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonStringNotEqualsJsonString'], [$expectedJson, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function jsonStringEqualsJsonFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertJsonStringEqualsJsonFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonStringEqualsJsonFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function jsonStringNotEqualsJsonFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertJsonStringNotEqualsJsonFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonStringNotEqualsJsonFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two JSON files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function jsonFileNotEqualsJsonFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertJsonFileNotEqualsJsonFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonFileNotEqualsJsonFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }

    /**
     * Asserts that two JSON files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     * @return $this
     */
    public function jsonFileEqualsJsonFile($expectedFile, $message = '')
    {
        $this->validateCallable('assertJsonFileEqualsJsonFile');
        forward_static_call_array([self::ASSERT_CLASS, 'assertJsonFileEqualsJsonFile'], [$expectedFile, self::$actual, $message]);

        return $this;
    }
}
