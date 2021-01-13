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
    private Ticket $ticket;

    protected function setUp(): void
    {
        $this->ticket = new Ticket();
    }

    public function testCanDecorateWithMascot(): void
    {
        $option = new Mascot($this->ticket);

        $this->assertSame($this->ticket->calculatePrice() + Mascot::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithAccommodation(): void
    {
        $option = new Accommodation($this->ticket);

        $this->assertSame($this->ticket->calculatePrice() + Accommodation::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithSticker(): void
    {
        $option = new Sticker($this->ticket);

        $this->assertSame($this->ticket->calculatePrice() + Sticker::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateWithCatering(): void
    {
        $option = new Catering($this->ticket);

        $this->assertSame($this->ticket->calculatePrice() + Catering::PRICE, $option->calculatePrice());
    }

    public function testCanDecorateFullOption(): void
    {
        $option = new Mascot($this->ticket);
        $option = new Accommodation($option);
        $option = new Sticker($option);
        $option = new Catering($option);

        $fullOptionPrice =
            $this->ticket->calculatePrice() + Mascot::PRICE + Accommodation::PRICE + Sticker::PRICE + Catering::PRICE;

        $this->assertSame($fullOptionPrice, $option->calculatePrice());
    }
}
