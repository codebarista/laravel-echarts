<?php

namespace Codebarista\LaravelEcharts;

trait Makeable
{
    /**
     * Create a new element.
     */
    public static function make(...$arguments): static
    {
        return new static(...$arguments);
    }
}
