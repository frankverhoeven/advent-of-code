<?php
declare(strict_types=1);

use FrankVerhoeven\AdventOfCode\SolverInterface;

require 'vendor/autoload.php';

$day = $argv[1] ?? null;

if (null === $day) {
    echo 'No day specified' . PHP_EOL;
    exit(1);
}

$solver = 'FrankVerhoeven\AdventOfCode\Y2025\Day' . $day . '\Solver';

if (!class_exists($solver) || !is_subclass_of($solver, SolverInterface::class)) {
    echo 'Solver does not exist' . PHP_EOL;
    exit(1);
}

$input = trim(file_get_contents('src/Y2025/Day' . $day . '/input.txt'));

echo new $solver($input)->solve() . PHP_EOL;
