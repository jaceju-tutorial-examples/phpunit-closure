<?php

use Ns\Example;

class ExampleTest extends PHPUnit_Framework_TestCase
{
	public function testRunWithMe()
	{
        $self = $this;
        $example = new Example();
        $example->runWithMe(function () use ($self) {
            $self->assertInstanceOf(Example::class, $this);
        });
	}

    public function testRunWithoutMe()
    {
        $spy = Mockery::mock(function () {});
        $spy->shouldReceive('detected')->once();

        $example = new Example();
        $example->runWithoutMe(function () use ($spy) {
            $spy->detected();
        });
    }
}