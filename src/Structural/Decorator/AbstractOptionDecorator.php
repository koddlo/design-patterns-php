<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

abstract class AbstractOptionDecorator implements OptionInterface
{
    protected OptionInterface $option;

    public function __construct(OptionInterface $option)
    {
        $this->option = $option;
    }
}
