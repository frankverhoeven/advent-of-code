<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day4;

use FrankVerhoeven\AdventOfCode\SolverInterface;

final class Solver implements SolverInterface
{
    /** @var list<list<string>> */
    private array $grid;

    public function __construct(string $input)
    {
        $this->grid = \array_map(
            \str_split(...),
            \explode("\n", $input),
        );
    }

    public function solve(): string
    {
        $count = 0;

        startLoop:

        foreach ($this->grid as $y => $row) {
            foreach ($row as $x => $value) {
                if ('@' !== $value) {
                    continue;
                }

                if ($this->isPositionAccessible($x, $y)) {
                    $this->grid[$y][$x] = '.';
                    $count++;

                    goto startLoop;
                }
            }
        }

        return (string) $count;
    }

    private function isPositionAccessible(int $x, int $y): bool
    {
        $count = 0;

        for ($i = $x - 1; $i <= $x + 1; $i++) {
            for ($j = $y - 1; $j <= $y + 1; $j++) {
                if ($i === $x && $j === $y) {
                    continue;
                }

                if (!isset($this->grid[$j][$i])) {
                    continue;
                }

                if ('@' === $this->grid[$j][$i]) {
                    $count++;
                }
            }
        }

        return $count < 4;
    }
}
