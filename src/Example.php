<?php

namespace Ns;

use Closure;

class Example
{
    private $num = '123';

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