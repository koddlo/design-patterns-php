<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State\Test;

use DesignPatterns\Behavioral\State\InvalidStateException;
use DesignPatterns\Behavioral\State\State;
use DesignPatterns\Behavioral\State\Task;
use PHPUnit\Framework\TestCase;

final class TaskTest extends TestCase
{
    public function testCanChangeOpenTaskToInProgress(): void
    {
        $task = new Task();

        $task->changeState(State::IN_PROGRESS);

        self::assertTrue($task->isInProgress());
    }

    public function testCannotChangeOpenTaskToOpen(): void
    {
        $task = new Task();

        self::expectException(InvalidStateException::class);

        $task->changeState(State::OPEN);
    }

    public function testCannotChangeOpenTaskToResolved(): void
    {
        $task = new Task();

        self::expectException(InvalidStateException::class);

        $task->changeState(State::RESOLVED);
    }

    public function testCannotChangeOpenTaskToReopened(): void
    {
        $task = new Task();

        self::expectException(InvalidStateException::class);

        $task->changeState(State::REOPENED);
    }

    public function testCannotChangeOpenTaskToClosed(): void
    {
        $task = new Task();

        self::expectException(InvalidStateException::class);

        $task->changeState(State::CLOSED);
    }

    public function testCanChangeInProgressTaskToOpen(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        $task->changeState(State::OPEN);

        self::assertTrue($task->isOpen());
    }

    public function testCanChangeInProgressTaskToResolved(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        $task->changeState(State::RESOLVED);

        self::assertTrue($task->isResolved());
    }

    public function testCannotChangeInProgressTaskToInProgress(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::IN_PROGRESS);
    }

    public function testCannotChangeInProgressTaskToReopened(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::REOPENED);
    }

    public function testCannotChangeInProgressTaskToClosed(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::CLOSED);
    }

    public function testCanChangeResolvedTaskToInProgress(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        $task->changeState(State::IN_PROGRESS);

        self::assertTrue($task->isInProgress());
    }

    public function testCanChangeResolvedTaskToClosed(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        $task->changeState(State::CLOSED);

        self::assertTrue($task->isClosed());
    }

    public function testCannotChangeResolvedTaskToResolved(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::RESOLVED);
    }

    public function testCannotChangeResolvedTaskToOpen(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::OPEN);
    }

    public function testCannotChangeResolvedTaskToReopened(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::REOPENED);
    }

    public function testCanChangeClosedTaskToReopened(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        $task->changeState(State::REOPENED);

        self::assertTrue($task->isReopened());
    }

    public function testCanChangeClosedTaskToResolved(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        $task->changeState(State::RESOLVED);

        self::assertTrue($task->isResolved());
    }

    public function testCannotChangeClosedTaskToClosed(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::CLOSED);
    }

    public function testCannotChangeClosedTaskToOpen(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::OPEN);
    }

    public function testCannotChangeClosedTaskToInProgress(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::IN_PROGRESS);
    }

    public function testCanChangeReopenedTaskToInProgress(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        $task->changeState(State::IN_PROGRESS);

        self::assertTrue($task->isInProgress());
    }

    public function testCanChangeReopenedTaskToClosed(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        $task->changeState(State::CLOSED);

        self::assertTrue($task->isClosed());
    }

    public function testCannotChangeReopenedTaskToReopened(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::REOPENED);
    }

    public function testCannotChangeReopenedTaskToResolved(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::RESOLVED);
    }

    public function testCannotChangeReopenedTaskToOpen(): void
    {
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        self::expectException(InvalidStateException::class);

        $task->changeState(State::OPEN);
    }

    public function testCanEstimateOpenTask(): void
    {
        $points = 5;
        $task = new Task();

        $task->estimate($points);

        self::assertSame($points, $task->getEstimatePoints());
    }

    public function testCanEstimateReopenedTask(): void
    {
        $points = 5;
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);
        $task->changeState(State::REOPENED);

        $task->estimate($points);

        self::assertSame($points, $task->getEstimatePoints());
    }

    public function testCannotEstimateInProgressTask(): void
    {
        $points = 5;
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);

        self::expectException(InvalidStateException::class);

        $task->estimate($points);
    }

    public function testCannotEstimateResolvedTask(): void
    {
        $points = 5;
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);

        self::expectException(InvalidStateException::class);

        $task->estimate($points);
    }

    public function testCannotEstimateClosedTask(): void
    {
        $points = 5;
        $task = new Task();
        $task->changeState(State::IN_PROGRESS);
        $task->changeState(State::RESOLVED);
        $task->changeState(State::CLOSED);

        self::expectException(InvalidStateException::class);

        $task->estimate($points);
    }
}
