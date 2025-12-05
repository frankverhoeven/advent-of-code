<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day5;

use FrankVerhoeven\AdventOfCode\SolverInterface;

final class Solver implements SolverInterface
{
    /** @var list<array{int, int}> */
    private array $ranges;
    /** @var list<int> */
    private array $ingredients;

    public function __construct(string $input)
    {
        [$ranges, $ingredients] = \explode("\n\n", $input);

        $this->ranges = \array_map(
            static fn (string $range): array => \explode('-', \trim($range)),
            \explode("\n", $ranges)
        );
        $this->ingredients = \array_map('intval', \explode("\n", $ingredients));
    }

    public function solve(): string
    {
        $count = 0;
        $ranges = $this->mergeRanges($this->ranges);

        foreach ($ranges as [$min, $max]) {
            $count += $max - $min + 1;
        }

        return (string) $count;
    }

    private function mergeRanges(array $ranges): array {
        \sort($ranges);

        $merged = [];
        [$curMin, $curMax] = $ranges[0];

        foreach ($ranges as [$min, $max]) {
            if ($min <= $curMax + 1) {
                $curMax = \max($curMax, $max);
            } else {
                $merged[] = [$curMin, $curMax];
                [$curMin, $curMax] = [$min, $max];
            }
        }

        $merged[] = [$curMin, $curMax];
        return $merged;
    }
}
