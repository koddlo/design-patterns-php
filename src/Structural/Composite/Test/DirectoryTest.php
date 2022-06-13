<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite\Test;

use DesignPatterns\Structural\Composite\Directory;
use DesignPatterns\Structural\Composite\File;
use PHPUnit\Framework\TestCase;

final class DirectoryTest extends TestCase
{
    public function testCanGetSizeOfEmptyDirectory(): void
    {
        self::assertSame(0, (new Directory())->getSize());
    }

    public function testCanGetSizeOfDirectoryThatContainsOnlyFiles(): void
    {
        $directory = new Directory();

        $directory->addElement(new File(12));
        $directory->addElement(new File(8));

        self::assertSame(20, $directory->getSize());
    }

    public function testCanGetSizeOfDirectoryThatContainsDirectoriesAndFiles(): void
    {
        $firstChildDirectory = new Directory();
        $secondChildDirectory = new Directory();
        $parentDirectory = new Directory();

        $firstChildDirectory->addElement(new File(12));
        $secondChildDirectory->addElement(new File(12));
        $secondChildDirectory->addElement(new File(24));
        $secondChildDirectory->addElement(new File(12));
        $parentDirectory->addElement(new File(16));
        $parentDirectory->addElement(new File(24));
        $parentDirectory->addElement($firstChildDirectory);
        $parentDirectory->addElement($secondChildDirectory);

        self::assertSame(100, $parentDirectory->getSize());
    }
}
