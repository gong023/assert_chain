<?php
namespace AssertChain\Container\Test;

use AssertChain\AssertChain;

class AggregaterTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    /**
     * @test
     */
    public function assertReturnAggregater()
    {
        $this->assertInstanceOf('\AssertChain\Container\Aggregater', $this->centralizedAssert('some value'));
    }

    public function testWithArray()
    {
        $this->centralizedAssert(['key' => 'value'])
            ->notNull()
            ->notEmpty()
            ->notCount(0)
            ->count(1)
            ->arrayNotHasKey('no existing key')
            ->arrayHasKey('key')
            ->notContains('no existing value')
            ->contains('value')
            ->equals(['key' => 'value']);
    }

    public function testWithInt()
    {
        $this->centralizedAssert(10)
            ->notTrue()
            ->notFalse()
            ->notInternalType('float')
            ->internalType('integer')
            ->lessThan(11)
            ->lessThanOrEqual(10)
            ->notEquals('11')
            ->equals('10')
            ->notSame('10')
            ->same(10);
    }

    public function testWithString()
    {
        $this->centralizedAssert('test string')
            ->stringStartsNotWith('a')
            ->stringStartsWith('tes')
            ->stringEndsNotWith('a')
            ->stringEndsWith('ing')
            ->notRegExp('/^not matches/')
            ->regExp('/^test/')
            ->regExp('/string$/');
    }

    public function testWithJsonString()
    {
        $this->centralizedAssert('{"test":"json"}')
            ->json()
            ->jsonStringNotEqualsJsonString('{"wrong":"json"}')
            ->jsonStringEqualsJsonString('{"test":"json"}');
    }

    public function testWithClass()
    {
        $this->centralizedAssert('\AssertChain\Container\Test\SampleClass')
            ->classNotHasAttribute('no existing attribute')
            ->classHasAttribute('attrInt1')
            ->classNotHasStaticAttribute('no existing static attribute')
            ->classHasStaticAttribute('staticAttr');
    }

    public function testWithObject()
    {
        $this->centralizedAssert(new SampleClass(20, new \stdClass))
            ->objectNotHasAttribute('no existing attribute')
            ->objectHasAttribute('attrInt2')
            ->attributeNotEmpty('attrArray')
            ->attributeNotCount(4, 'attrArray')
            ->attributeCount(3, 'attrArray')
            ->attributeNotContains(4, 'attrArray')
            ->attributeContains(1, 'attrArray')
            ->attributeNotContainsOnly('string', 'attrArray')
            ->attributeContainsOnly('integer', 'attrArray')
            ->attributeGreaterThanOrEqual(10, 'attrInt1')
            ->attributeGreaterThan(9, 'attrInt1')
            ->attributeLessThanOrEqual(20, 'attrInt2')
            ->attributeLessThan(21, 'attrInt2')
            ->attributeNotEquals(21, 'attrInt2')
            ->attributeEquals('20', 'attrInt2')
            ->attributeNotInternalType('string', 'attrInt2')
            ->attributeInternalType('integer', 'attrInt2')
            ->attributeNotSame('20', 'attrInt2')
            ->attributeSame(20, 'attrInt2')
            ->attributeNotInstanceOf('\AssertChain\Container\Test\SampleClass', 'attrStdClass')
            ->attributeInstanceOf('\stdClass', 'attrStdClass');
    }
}

class SampleClass
{
    public $attrInt1 = 10;
    public static $staticAttr = 'staticValue1';
    public $attrArray = [1, 2, 3];

    public function __construct($int, $stdClass)
    {
        $this->attrInt2 = $int;
        $this->attrStdClass = $stdClass;
    }
}