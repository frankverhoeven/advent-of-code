<?php
declare(strict_types=1);

namespace FrankVerhoeven\AdventOfCode\Y2025\Day2;

use PHPUnit\Framework\TestCase;

final class SolverTest extends TestCase
{
    private Solver $solver;

    protected function setUp(): void
    {
        $this->solver = new Solver(<<<'INPUT'
        11-22,95-115,998-1012,1188511880-1188511890,222220-222224,1698522-1698528,446443-446449,38593856-38593862,565653-565659,824824821-824824827,2121212118-2121212124
        INPUT);
    }

    public function testSolve(): void
    {
        self::assertSame('4174379265', $this->solver->solve());
    }
}
