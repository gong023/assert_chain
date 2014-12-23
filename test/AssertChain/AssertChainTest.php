<?php
namespace AssertChain\Test;

use AssertChain\AssertChain;

class AssertChainTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    /**
     * @test
     */
    public function assertReturnAggregater()
    {
        $this->assertInstanceOf('\AssertChain\Aggregater', $this->assert('some value'));
    }

    public function testWithArray()
    {
        $this->assert(['key' => 'value'])
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
        $this->assert(10)
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
        $this->assert('test string')
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
        $this->assert('{"test":"json"}')
            ->json()
            ->jsonStringNotEqualsJsonString('{"wrong":"json"}')
            ->jsonStringEqualsJsonString('{"test":"json"}');
    }

    public function testWithClass()
    {
        $this->assert('\AssertChain\Test\SampleClass')
            ->classNotHasAttribute('no existing attribute')
            ->classHasAttribute('attr1')
            ->classNotHasStaticAttribute('no existing static attribute')
            ->classHasStaticAttribute('staticAttr');
    }

    public function testWithObject()
    {
        $this->assert(new SampleClass(20, new \stdClass))
            ->objectNotHasAttribute('no existing attribute')
            ->objectHasAttribute('attr2')
            ->attributeNotEmpty('attrArray')
            ->attributeNotCount(4, 'attrArray')
            ->attributeCount(3, 'attrArray')
            ->attributeNotContains(4, 'attrArray')
            ->attributeContains(1, 'attrArray')
            ->attributeNotContainsOnly('string', 'attrArray')
            ->attributeContainsOnly('integer', 'attrArray')
            ->attributeCount(3, 'attrArray')
            ->attributeGreaterThanOrEqual(10, 'attr1')
            ->attributeGreaterThan(9, 'attr1')
            ->attributeLessThanOrEqual(20, 'attr2')
            ->attributeLessThan(21, 'attr2')
            ->attributeNotEquals(21, 'attr2')
            ->attributeEquals('20', 'attr2')
            ->attributeNotInternalType('string', 'attr2')
            ->attributeInternalType('integer', 'attr2')
            ->attributeNotSame('20', 'attr2')
            ->attributeSame(20, 'attr2')
            ->attributeNotInstanceOf('\AssertChain\Test\SampleClass', 'attrStdClass')
            ->attributeInstanceOf('\stdClass', 'attrStdClass');
    }
}

class SampleClass
{
    public $attr1 = 10;
    public static $staticAttr = 'staticValue1';
    public $attrArray = [1, 2, 3];

    public function __construct($value, $stdClass)
    {
        $this->attr2 = $value;
        $this->attrStdClass = $stdClass;
    }
}