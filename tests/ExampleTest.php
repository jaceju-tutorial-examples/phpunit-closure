<?php

use Ns\Example;

class ExampleTest extends PHPUnit_Framework_TestCase
{
	public function testRunWithMe()
	{
        $assert = $this;
        $example = new Example();

        $example->runWithMe(function () use ($assert) {
            $assert->assertInstanceOf(Example::class, $this);
        });
	}

    public function testRunWithoutMe()
    {
        $spy = Mockery::mock(new stdClass());
        $spy->shouldReceive('detected')->once();

        $example = new Example();
        $example->runWithoutMe(function () use ($spy) {
            $spy->detected();
        });
    }
}