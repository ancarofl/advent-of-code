<?php

declare(strict_types=1);

function solve_part1(string $input): int|string
{
    $count  = 0;
    $result = 50;

    foreach (explode("\n", $input) as $line) {
        $line = rtrim($line, "\r");

        $direction = $line[0];
        $steps     = (int)substr($line, 1);

        $fullTurns      = intdiv($steps, 99);
        $remainingSteps = $steps % 99;

        echo "Currently at: " . $result . ". Turn " . $direction . $steps . "\n";

        // echo $direction . ":" . $steps . ". Currently at: " . $result . " Full turns: " . $fullTurns . " Remaining steps: " . $remainingSteps . "\n";

        $steps = $fullTurns;

        if ($direction === "R") {
            if ($result - $steps < 0) {
                $result = abs(100 + ($result - $steps));
            } else {
                $result = $result - $steps;
            }
        }
        if ($direction === "L") {
            if ($result + $steps > 99) {
                $result = abs(100 - ($result + $steps));
            } else {
                $result = $result + $steps;
            }
        }

        $steps = $remainingSteps;

        if ($direction === "L") {
            if ($result - $steps < 0) {
                $result = abs(100 + ($result - $steps));
            } else {
                $result = $result - $steps;
            }
        }
        if ($direction === "R") {
            if ($result + $steps > 99) {
                $result = abs(100 - ($result + $steps));
            } else {
                $result = $result + $steps;
            }
        }


        if ($result === 0) $count++;
    }

    return $count;
}
