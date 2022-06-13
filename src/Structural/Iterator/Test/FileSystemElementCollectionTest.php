<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Iterator\Test;

use DesignPatterns\Structural\Iterator\Directory;
use DesignPatterns\Structural\Iterator\FileSystemElementCollection;
use PHPUnit\Framework\TestCase;

class FileSystemElementCollectionTest extends TestCase
{
    public function testIsCurrentElementNullOfEmptyCollection(): void
    {
        self::assertNull((new FileSystemElementCollection())->current());
    }

    public function testCanGoForNextElementOfCollection(): void
    {
        $directoryOne = new Directory();
        $directoryTwo = new Directory();
        $collection = new FileSystemElementCollection();
        $collection->add($directoryOne);
        $collection->add($directoryTwo);

        $collection->next();

        self::assertSame($directoryTwo, $collection->current());
    }


    public function testIsCurrentKeyElementNullOfEmptyCollection(): void
    {
        self::assertNull((new FileSystemElementCollection())->key());
    }

    public function testIsCurrentPositionOfEmptyCollectionInvalid(): void
    {
        self::assertFalse((new FileSystemElementCollection())->valid());
    }

    public function testIsCurrentPositionOfFullCollectionValid(): void
    {
        $collection = new FileSystemElementCollection();
        $collection->add(new Directory());

        self::assertTrue($collection->valid());
    }

    public function testCanRewindEmptyCollection(): void
    {
        $collection = new FileSystemElementCollection();

        $collection->rewind();

        self::assertFalse($collection->valid());
    }

    public function testCanRewindFullCollection(): void
    {
        $directoryOne = new Directory();
        $directoryTwo = new Directory();
        $collection = new FileSystemElementCollection();
        $collection->add($directoryOne);
        $collection->add($directoryTwo);

        $collection->next();
        $collection->rewind();

        self::assertSame($directoryOne, $collection->current());
    }
}
