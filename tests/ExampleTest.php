<?php

use Ns\Example;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testWrongExample()
    {
        $this->markTestSkipped();
        $example = new Example();

        $closure = Mockery::mock(function ($target) {});
        $example->runClosureWithTargetInject($closure);

        $closure = Mockery::mock(Closure::class);
        $example->runClosureWithTargetInject($closure);
    }

    public function testRunAndInjection()
    {
        $example = new Example();

        $example->runClosureWithTargetInject(function ($target) {
            $this->assertInstanceOf(Example::class, $target);
        });
    }

    public function testRunWithMe()
    {
        $assert = $this;
        $example = new Example();

        $example->runClosureWithTarget(function () use ($assert) {
            $assert->assertInstanceOf(Example::class, $this);
        });
    }

    public function testRunWithoutMe()
    {
        $spy = Mockery::mock(stdClass::class);
        $example = new Example();

        $spy->shouldReceive('detected')->once();

        $example->runClosure(function () use ($spy) {
            $spy->detected();
        });
    }
}