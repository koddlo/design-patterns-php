<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command\Test;

use DesignPatterns\Behavioral\Command\Author;
use DesignPatterns\Behavioral\Command\Like;
use DesignPatterns\Behavioral\Command\Post;
use PHPUnit\Framework\TestCase;

final class LikeTest extends TestCase
{
    public function testCanReactLike(): void
    {
        $interactive = new Post();
        $command = new Like(new Author(), $interactive);

        $command->execute();

        self::assertSame(1, $interactive->countLikes());
    }
}
