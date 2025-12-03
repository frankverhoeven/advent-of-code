<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day1;

use PHPUnit\Framework\TestCase;

final class SolverTest extends TestCase
{
    private Solver $solver;

    protected function setUp(): void
    {
        $this->solver = new Solver(<<<'INPUT'
        L68
        L30
        R48
        L5
        R60
        L55
        L1
        L99
        R14
        L82
        INPUT);
    }

    public function testSolve(): void
    {
        self::assertSame('6', $this->solver->solve());
    }
}
