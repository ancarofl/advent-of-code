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

function solve_part2(string $input): int|string
{
    $count  = 0;
    $result = 50;

    foreach (explode("\n", $input) as $line) {
        $line = rtrim($line, "\r");

        $direction = $line[0];
        $steps     = (int)substr($line, 1);

        $fullTurns      = intdiv($steps, 100);
        $remainingSteps = $steps % 100;

        echo $direction . ":" . $steps . ". Currently at: " . $result . ". Full turns: " . $fullTurns . ". Remaining steps: " . $remainingSteps . ". Count: " . $count . "\n";

        $steps = $remainingSteps;

        if ($direction === "L" && $result === 0) {
            echo "Decrease count cuz start at 0 means we already counted it" . "\n";
            $count--;
        }

        if ($direction === "L") {
            if ($result - $steps < 0) {
                $result = 100 - abs($result - $steps);
                // Crossed through 0
                echo "Increase count cuz L cross through 0 cuz result-steps < 0" . "\n";
                $count++;
            } else {
                $result = $result - $steps;
                // Ended at 0
                if ($result === 0) {
                    echo "Increase count cuz L ended at 0" . "\n";
                    $count++;
                }
            }
        }
        if ($direction === "R") {
            if ($result + $steps > 99) {
                $result = ($result + $steps) - 100;
                // Crossed through 0
                echo "Increase count cuz R cross through 0 cuz result+steps > 99" . "\n";
                $count++;
            } else {
                $result = $result + $steps;
            }
        }

        $count += $fullTurns;
    }

    return $count;
}
