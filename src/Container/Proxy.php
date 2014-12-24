<?php
namespace AssertChain\Container;


use AssertChain\Container;

/**
 * Class Proxy
 *
 * @package AssertChain\Container
 *
 * @method \AssertChain\Container\Proxy arrayHasKey($key, $array, $message = '')
 * @method \AssertChain\Container\Proxy arraySubset($subset, $array, $strict = false, $message = '')
 * @method \AssertChain\Container\Proxy arrayNotHasKey($key, $array, $message = '')
 * @method \AssertChain\Container\Proxy contains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
 * @method \AssertChain\Container\Proxy attributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
 * @method \AssertChain\Container\Proxy notContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
 * @method \AssertChain\Container\Proxy attributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
 * @method \AssertChain\Container\Proxy containsOnly($type, $haystack, $isNativeType = NULL, $message = '')
 * @method \AssertChain\Container\Proxy containsOnlyInstancesOf($classname, $haystack, $message = '')
 * @method \AssertChain\Container\Proxy attributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = NULL, $message = '')
 * @method \AssertChain\Container\Proxy notContainsOnly($type, $haystack, $isNativeType = NULL, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = NULL, $message = '')
 * @method \AssertChain\Container\Proxy count($expectedCount, $haystack, $message = '')
 * @method \AssertChain\Container\Proxy attributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy notCount($expectedCount, $haystack, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy equals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy attributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy notEquals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy attributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy beEmpty($actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy notEmpty($actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy greaterThan($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy greaterThanOrEqual($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy lessThan($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy lessThanOrEqual($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy fileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy fileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy stringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy stringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \AssertChain\Container\Proxy fileExists($filename, $message = '')
 * @method \AssertChain\Container\Proxy fileNotExists($filename, $message = '')
 * @method \AssertChain\Container\Proxy true($condition, $message = '')
 * @method \AssertChain\Container\Proxy notTrue($condition, $message = '')
 * @method \AssertChain\Container\Proxy false($condition, $message = '')
 * @method \AssertChain\Container\Proxy notFalse($condition, $message = '')
 * @method \AssertChain\Container\Proxy notNull($actual, $message = '')
 * @method \AssertChain\Container\Proxy null($actual, $message = '')
 * @method \AssertChain\Container\Proxy classHasAttribute($attributeName, $className, $message = '')
 * @method \AssertChain\Container\Proxy classNotHasAttribute($attributeName, $className, $message = '')
 * @method \AssertChain\Container\Proxy classHasStaticAttribute($attributeName, $className, $message = '')
 * @method \AssertChain\Container\Proxy classNotHasStaticAttribute($attributeName, $className, $message = '')
 * @method \AssertChain\Container\Proxy objectHasAttribute($attributeName, $object, $message = '')
 * @method \AssertChain\Container\Proxy objectNotHasAttribute($attributeName, $object, $message = '')
 * @method \AssertChain\Container\Proxy same($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy notSame($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \AssertChain\Container\Proxy instanceOf($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
 * @method \AssertChain\Container\Proxy notInstanceOf($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
 * @method \AssertChain\Container\Proxy internalType($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeInternalType($expected, $attributeName, $classOrObject, $message = '')
 * @method \AssertChain\Container\Proxy notInternalType($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy attributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
 * @method \AssertChain\Container\Proxy regExp($pattern, $string, $message = '')
 * @method \AssertChain\Container\Proxy notRegExp($pattern, $string, $message = '')
 * @method \AssertChain\Container\Proxy sameSize($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy notSameSize($expected, $actual, $message = '')
 * @method \AssertChain\Container\Proxy stringMatchesFormat($format, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringNotMatchesFormat($format, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringMatchesFormatFile($formatFile, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringNotMatchesFormatFile($formatFile, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringStartsWith($prefix, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringStartsNotWith($prefix, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringEndsWith($suffix, $string, $message = '')
 * @method \AssertChain\Container\Proxy stringEndsNotWith($suffix, $string, $message = '')
 * @method \AssertChain\Container\Proxy xmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
 * @method \AssertChain\Container\Proxy xmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
 * @method \AssertChain\Container\Proxy xmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
 * @method \AssertChain\Container\Proxy xmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
 * @method \AssertChain\Container\Proxy xmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
 * @method \AssertChain\Container\Proxy xmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
 * @method \AssertChain\Container\Proxy equalXMLStructure(\DOMElement $expectedElement, \DOMElement $actualElement, $checkAttributes = false, $message = '')
 * @method \AssertChain\Container\Proxy selectCount($selector, $count, $actual, $message = '', $isHtml = true)
 * @method \AssertChain\Container\Proxy selectRegExp($selector, $pattern, $count, $actual, $message = '', $isHtml = true)
 * @method \AssertChain\Container\Proxy selectEquals($selector, $content, $count, $actual, $message = '', $isHtml = true)
 * @method \AssertChain\Container\Proxy tag($matcher, $actual, $message = '', $isHtml = true)
 * @method \AssertChain\Container\Proxy notTag($matcher, $actual, $message = '', $isHtml = true)
 * @method \AssertChain\Container\Proxy that($value, \PHPUnit_Framework_Constraint $constraint, $message = '')
 * @method \AssertChain\Container\Proxy json($actualJson, $message = '')
 * @method \AssertChain\Container\Proxy jsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
 * @method \AssertChain\Container\Proxy jsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
 * @method \AssertChain\Container\Proxy jsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
 * @method \AssertChain\Container\Proxy jsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
 * @method \AssertChain\Container\Proxy jsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
 * @method \AssertChain\Container\Proxy jsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
 */
class Proxy extends Container
{
    public function __call($method, $args)
    {
        switch($method) {
            case 'arrayHasKey':
                $method = 'assert' . ucfirst($method);
                break;
            case 'beEmpty':
                $method = 'assertEmpty';
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
