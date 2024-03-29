<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command\Test;

use DesignPatterns\Behavioral\Command\Author;
use DesignPatterns\Behavioral\Command\Post;
use DesignPatterns\Behavioral\Command\Wow;
use PHPUnit\Framework\TestCase;

final class WowTest extends TestCase
{
    public function testCanReactWow(): void
    {
        $interactive = new Post();
        $command = new Wow(new Author(), $interactive);

        $command->execute();

        self::assertSame(1, $interactive->countWows());
    }
}
