<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

abstract class AbstractOptionDecorator implements OptionInterface
{
    public function __construct(
        protected OptionInterface $option
    ) {}
}
