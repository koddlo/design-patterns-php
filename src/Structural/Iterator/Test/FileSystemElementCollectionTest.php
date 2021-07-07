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
        $this->assertNull((new FileSystemElementCollection())->current());
    }

    public function testCanGoForNextElementOfCollection(): void
    {
        $directoryOne = new Directory();
        $directoryTwo = new Directory();
        $collection = new FileSystemElementCollection();
        $collection->add($directoryOne);
        $collection->add($directoryTwo);

        $collection->next();

        $this->assertSame($directoryTwo, $collection->current());
    }


    public function testIsCurrentKeyElementNullOfEmptyCollection(): void
    {
        $this->assertNull((new FileSystemElementCollection())->key());
    }

    public function testIsCurrentPositionOfEmptyCollectionInvalid(): void
    {
        $this->assertFalse((new FileSystemElementCollection())->valid());
    }

    public function testIsCurrentPositionOfFullCollectionValid(): void
    {
        $collection = new FileSystemElementCollection();
        $collection->add(new Directory());

        $this->assertTrue($collection->valid());
    }

    public function testCanRewindEmptyCollection(): void
    {
        $collection = new FileSystemElementCollection();

        $collection->rewind();

        $this->assertFalse($collection->valid());
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

        $this->assertSame($directoryOne, $collection->current());
    }
}
