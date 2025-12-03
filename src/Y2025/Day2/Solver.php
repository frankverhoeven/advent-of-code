<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day2;

use FrankVerhoeven\AdventOfCode\SolverInterface;

final class Solver implements SolverInterface
{
    /** @var list<string> */
    private array $ranges;
    /** @var list<int> */
    private array $invalidRanges = [];

    public function __construct(string $input)
    {
        $this->ranges = \explode(',', $input);
    }

    public function solve(): string
    {
        foreach ($this->ranges as $range) {
            [$start, $end] = \explode('-', $range);

            for ($i = $start; $i <= $end; $i++) {
                $s = (string) $i;

                if (\str_contains(\substr($s.$s, 1, -1), $s)) {
                    $this->invalidRanges[] = $i;
                }
            }
        }

        return (string) \array_sum($this->invalidRanges);
    }
}
