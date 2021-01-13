<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class Post implements InteractiveInterface
{
    public const LIKE_SLUG = 'like';
    public const WOW_SLUG = 'wow';

    private array $reactionStatistics;

    public function __construct()
    {
        $this->reactionStatistics = [];
    }

    public function like(string $authorId): void
    {
        if ($this->shouldUndo($authorId, self::LIKE_SLUG)) {
            unset($this->reactionStatistics[$authorId]);

            return;
        }

        $this->reactionStatistics[$authorId] = self::LIKE_SLUG;
    }

    public function wow(string $authorId): void
    {
        if ($this->shouldUndo($authorId, self::WOW_SLUG)) {
            unset($this->reactionStatistics[$authorId]);

            return;
        }

        $this->reactionStatistics[$authorId] = self::WOW_SLUG;
    }

    public function countLikes(): int
    {
        $sums = array_count_values($this->reactionStatistics);

        return $sums[self::LIKE_SLUG] ?? 0;
    }

    public function countWows(): int
    {
        $sums = array_count_values($this->reactionStatistics);

        return $sums[self::WOW_SLUG] ?? 0;
    }

    private function shouldUndo(string $authorId, string $reactionSlug): bool
    {
        return !empty($this->reactionStatistics[$authorId])
            && ($this->reactionStatistics[$authorId] === $reactionSlug);
    }
}
