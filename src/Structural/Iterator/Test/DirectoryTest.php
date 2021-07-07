<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Iterator\Test;

use DesignPatterns\Structural\Iterator\Directory;
use DesignPatterns\Structural\Iterator\File;
use PHPUnit\Framework\TestCase;

final class DirectoryTest extends TestCase
{
    public function testCanGetSizeOfEmptyDirectory(): void
    {
        $this->assertSame(0, (new Directory())->getSize());
    }

    public function testCanGetSizeOfDirectoryThatContainsOnlyFiles(): void
    {
        $directory = new Directory();

        $directory->addElement(new File(12));
        $directory->addElement(new File(8));

        $this->assertSame(20, $directory->getSize());
    }

    public function testCanGetSizeOfDirectoryThatContainsDirectoriesAndFiles(): void
    {
        $firstChildDirectory = new Directory();
        $firstChildDirectory->addElement(new File(12));

        $secondChildDirectory = new Directory();
        $secondChildDirectory->addElement(new File(12));
        $secondChildDirectory->addElement(new File(24));
        $secondChildDirectory->addElement(new File(12));

        $parentDirectory = new Directory();
        $parentDirectory->addElement(new File(16));
        $parentDirectory->addElement(new File(24));
        $parentDirectory->addElement($firstChildDirectory);
        $parentDirectory->addElement($secondChildDirectory);

        $this->assertSame(100, $parentDirectory->getSize());
    }
}
