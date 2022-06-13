<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Memento\Test;

use DesignPatterns\Behavioral\Memento\Package;
use DesignPatterns\Behavioral\Memento\PackageSnapshot;
use PHPUnit\Framework\TestCase;

final class PackageTest extends TestCase
{
    public function testCanIncreaseWeight(): void
    {
        $package = new Package(8.00, 38.00, 68.00, 25.00);

        $package->increaseWeight(25.00);

        $this->assertSame(50.00, $package->snapshot()->getWeight());
    }

    public function canMakeSnapshot(): void
    {
        $width = 8.00;
        $height = 38.00;
        $length = 68.00;
        $weight = 25.00;
        $package = new Package($width, $height, $length, $weight);

        $snapshot = $package->snapshot();

        $this->assertSame($width, $snapshot->getWidth());
        $this->assertSame($height, $snapshot->getHeight());
        $this->assertSame($length, $snapshot->getLength());
        $this->assertSame($weight, $snapshot->getWeight());
    }


    public function canRestoreFromSnapshot(): void
    {
        $snapshot = new PackageSnapshot(8.00, 38.00, 68.00, 25.00);

        $this->assertInstanceOf(Package::class, Package::restore($snapshot));
    }

    public function testIsSmall(): void
    {
        $package = new Package(8.00, 38.00, 68.00, 25.00);

        $this->assertTrue($package->isSmall());
    }

    public function testIsNotSmallWhenWidthIsToBig(): void
    {
        $package = new Package(8.01, 1.00, 1.00, 1.00);

        $this->assertFalse($package->isSmall());
    }

    public function testIsNotSmallWhenHeightIsToBig(): void
    {
        $package = new Package(1.00, 38.01, 1.00, 1.00);

        $this->assertFalse($package->isSmall());
    }

    public function testIsNotSmallWhenLengthIsToBig(): void
    {
        $package = new Package(1.00, 1.00, 68.01, 1.00);

        $this->assertFalse($package->isSmall());
    }

    public function testIsNotSmallWhenWeightIsToBig(): void
    {
        $package = new Package(1.00, 1.00, 1.00, 25.01);

        $this->assertFalse($package->isSmall());
    }
}
