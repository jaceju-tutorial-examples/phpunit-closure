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
        $closure = $closure->bindTo($this);
        $closure();
    }

    public function runClosure(Closure $closure)
    {
        $closure();
    }
}