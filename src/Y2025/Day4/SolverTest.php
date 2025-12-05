<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day4;

use PHPUnit\Framework\TestCase;

final class SolverTest extends TestCase
{
    private Solver $solver;

    protected function setUp(): void
    {
        $this->solver = new Solver(<<<'INPUT'
        ..@@.@@@@.
        @@@.@.@.@@
        @@@@@.@.@@
        @.@@@@..@.
        @@.@@@@.@@
        .@@@@@@@.@
        .@.@.@.@@@
        @.@@@.@@@@
        .@@@@@@@@.
        @.@.@@@.@.
        INPUT);
    }

    public function testSolve(): void
    {
        self::assertSame('43', $this->solver->solve());
    }
}
