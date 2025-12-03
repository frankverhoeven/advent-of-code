<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day1;

use FrankVerhoeven\AdventOfCode\SolverInterface;

final class Solver implements SolverInterface
{
    /** @var list<string> */
    private array $rotations;
    private int $pointer = 50;
    private int $password = 0;

    public function __construct(string $input)
    {
        $this->rotations = \explode("\n", $input);
    }

    public function solve(): string
    {
        foreach ($this->rotations as $rotation) {
            if ($rotation[0] === 'L') {
                $this->left((int) \substr($rotation, 1));
            } else {
                $this->right((int) \substr($rotation, 1));
            }

            if (0 === $this->pointer) {
                $this->password++;
            }
        }

        return (string) $this->password;
    }

    private function left(int $clicks): void
    {
        $this->pointer -= $clicks;

        while ($this->pointer < 0) {
            if ($this->pointer !== $clicks*-1) {
                $this->password++;
            }

            $this->pointer = 100 - $this->pointer*-1;
        }
    }

    private function right(int $clicks): void
    {
        $this->pointer += $clicks;

        while ($this->pointer > 99) {
            if ($this->pointer > 100) {
                $this->password++;
            }

            $this->pointer -= 100;
        }
    }
}
