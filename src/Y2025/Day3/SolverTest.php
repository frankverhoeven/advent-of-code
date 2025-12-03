<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day3;

use PHPUnit\Framework\TestCase;

final class SolverTest extends TestCase
{
    private Solver $solver;

    protected function setUp(): void
    {
        $this->solver = new Solver(<<<'INPUT'
        987654321111111
        811111111111119
        234234234234278
        818181911112111
        INPUT);
    }

    public function testSolve(): void
    {
        self::assertSame('3121910778619', $this->solver->solve());
    }
}
