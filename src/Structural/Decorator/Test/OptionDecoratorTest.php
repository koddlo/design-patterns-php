<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator\Test;

use DesignPatterns\Structural\Decorator\Accommodation;
use DesignPatterns\Structural\Decorator\Catering;
use DesignPatterns\Structural\Decorator\Mascot;
use DesignPatterns\Structural\Decorator\Sticker;
use DesignPatterns\Structural\Decorator\Ticket;
use PHPUnit\Framework\TestCase;

final class OptionDecoratorTest extends TestCase
{
    public function testCanDecorateWithMascot(): void
    {
        $ticket = new Ticket();
        $option = new Mascot($ticket);

        self::assertSame($ticket->calculatePrice() + Mascot::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithAccommodation(): void
    {
        $ticket = new Ticket();
        $option = new Accommodation($ticket);

        self::assertSame($ticket->calculatePrice() + Accommodation::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithSticker(): void
    {
        $ticket = new Ticket();
        $option = new Sticker($ticket);

        self::assertSame($ticket->calculatePrice() + Sticker::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithCatering(): void
    {
        $ticket = new Ticket();
        $option = new Catering($ticket);

        self::assertSame($ticket->calculatePrice() + Catering::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateFullOption(): void
    {
        $ticket = new Ticket();
        $option = new Mascot($ticket);
        $option = new Accommodation($option);
        $option = new Sticker($option);
        $option = new Catering($option);
        $fullPrice = $ticket->calculatePrice()
            + Mascot::PRICE
            + Accommodation::PRICE
            + Sticker::PRICE + Catering::PRICE;

        self::assertSame($fullPrice, $option->calculatePrice());
    }
}
