# AssertChain

AssertChain is PHPUnit helper. It enables you to write PHPUnit assert with method chain.

# Setup

Install AssertChain by composer.

```bash
composer require --dev gong023/assert-chain:dev-master
# install phpunit if you do not install yet.
# composer require --dev phpunit/phpunit:4.*
```

Import AssertChain trait to your test class.

```php
class YourTestClass extends \PHPUnit_Framework_TestCase
{
    use AssertChain;
}
```

# Usage

First you call `assert`, and keep asserting as you like.

You can use all assertions in PHPUnit_Framework_Assert.

```php
public function testWithArray()
{
    $arr = [
        'intKey'    => 1,
        'stringKey' => 'foo',
        'boolKey'   => true,
    ];

    $this->assert()
      ->notEmpty($arr)
      ->arrayHasKey('intKey', $arr)
      ->same(1, $arr['intKey'])
      ->arrayHasKey('stringKey', $arr)
      ->same('foo', $arr['stringKey'])
      ->arrayHasKey('boolKey', $arr)
      ->true($arr['boolKey']);

    /*
     * above code is equal to this.
     *
     * $this->assertNotEmpty($arr);
     * $this->assertArrayHasKey('intKey', $arr);
     * $this->assertSame(1, $arr['intKey']);
     * $this->assertArrayHasKey('stringKey', $arr);
     * $this->assertSame('foo', $arr['stringKey']);
     * $this->assertArrayHasKey('boolKey', $arr);
     * $this->assertTrue($arr['boolKey']);
     */
}
```

If you are sick of writing `$actual` value too many times, you can use `centralizedAssert`.

```php
public function testWithArray()
{
    $arr = ['key' => 'value'];

    $this->centralizedAssert($arr)
      ->notNull()
      ->notEmpty()
      ->notCount(0)
      ->count(1)
      ->arrayNotHasKey('no existing key')
      ->arrayHasKey('key')
      ->notContains('no existing value')
      ->contains('value')
      ->equals(['key' => 'value']);

    /*
     * above code is equal to this.
     *
     * $this->assertNotNull($arr);
     * $this->assertNotEmpty($arr);
     * $this->assertNotCount(0, $arr);
     * $this->assertCount(1, $arr);
     * $this->assertArrayNotHasKey('no existing key', $arr);
     * $this->assertNotContains('no existing value', $arr);
     * $this->assertContains('value', $arr);
     * $this->assertEquals(['key' = 'value']);
     */
}
```

`centralizedAssert` automatically sets `$actual` value to every assertions in PHPUnit_Framework_Assert.

You need not type `$actual` value too many times.

If you want to get more idea with centralizedAssert, [AssertChain test class will help you](https://github.com/gong023/assert_chain/blob/master/test/AssertChain/Container/AggregaterTest.php).

# IDE friendly

AssertChain is IDE friendly. You can get method autocomplete.
