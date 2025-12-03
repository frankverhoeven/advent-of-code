<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day3;

use FrankVerhoeven\AdventOfCode\SolverInterface;

final class Solver implements SolverInterface
{
    /** @var list<string> */
    private array $banks;
    /** @var list<int> */
    private array $joltages;

    public function __construct(string $input)
    {
        $this->banks = \explode("\n", $input);
    }

    public function solve(): string
    {
        foreach ($this->banks as $bank) {
            $chars = \str_split($bank);
            $length = \count($chars);
            $index = 0;
            $joltage = [];

            for ($i = 11; $i >= 0; $i--) {
                $slice = \array_slice($chars, $index, $length - $i - $index);

                $max = \max($slice);

                $index += \array_search($max, $slice, true) + 1;
                $joltage[] = $max;
            }

            $this->joltages[] = (int) \implode('', $joltage);
        }

        return (string) \array_sum($this->joltages);
    }
}
