<?php

declare(strict_types=1);

// Usage: php run.php <year> <day> [part]. [Part] defaults to 1. Eg: php run.php 2025 1 or php run.php 2025 1 2

// Parse arguments
$year = $argv[1];
$day  = $argv[2];
$part = $argv[3] ?? 1;

if ($year === null || $day === null) {
    fwrite(STDERR, "Usage: php run.php <year> <day> [part]\n");
    exit(1);
}

// Build directory path: root/year/dayN
$dayDirName = 'day' . $day;
$baseDir    = __DIR__ . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $dayDirName;

// Load solution file
$solutionFile = $baseDir . DIRECTORY_SEPARATOR . 'solution.php';
if (!file_exists($solutionFile)) {
    fwrite(STDERR, "No solution for year {$year}, day {$day} yet.\n");
    exit(1);
}
require $solutionFile; // Load and execute the solution file into the current script

// Choose solver
$solver = ($part == 1) ? 'solve_part1' : 'solve_part2';
if (!function_exists($solver)) {
    fwrite(STDERR, "Function {$solver}() not found in {$solutionFile}.\n");
    exit(1);
}

// Read input
$inputFile = $baseDir . DIRECTORY_SEPARATOR . 'input.txt';
$input     = file_exists($inputFile)
    ? rtrim(file_get_contents($inputFile), "\r\n")
    : '';

// Solve
$result = $solver($input);

// Print
echo $result . PHP_EOL;
