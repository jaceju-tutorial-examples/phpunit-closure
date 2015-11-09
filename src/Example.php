<?php

namespace Ns;

use Closure;

class Example
{
    public function runClosureWithTargetInject(Closure $closure)
    {
        $closure($this);
    }

    public function runClosureWithTarget(Closure $closure)
    {
        $cb = $closure->bindTo($this);
        $cb();
    }

    public function runClosure(Closure $closure)
    {
        $closure();
    }
}