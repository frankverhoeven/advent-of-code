<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day5;

use PHPUnit\Framework\TestCase;

final class SolverTest extends TestCase
{
    private Solver $solver;

    protected function setUp(): void
    {
        $this->solver = new Solver(<<<'INPUT'
        3-5
        10-14
        16-20
        12-18
        
        1
        5
        8
        11
        17
        32
        INPUT);
    }

    public function testSolve(): void
    {
        self::assertSame('14', $this->solver->solve());
    }
}
