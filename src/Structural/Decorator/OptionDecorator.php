<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

abstract class OptionDecorator implements Option
{
    protected Option $option;

    public function __construct(Option $option)
    {
        $this->option = $option;
    }
}
