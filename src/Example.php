<?php

namespace Ns;

use Closure;

class Example
{
    public function runWithMe(Closure $closure)
    {
        $closure = $closure->bindTo($this);
        $closure();
    }

    public function runWithoutMe(Closure $closure)
    {
        $closure();
    }
}