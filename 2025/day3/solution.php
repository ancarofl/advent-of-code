<?php

declare(strict_types=1);

function solve_part1(string $input): int|string
{
    $result = 0;

    foreach (explode("\n", $input) as $line) {
        $line = rtrim($line, "\r");
        echo $line . "\n";

        $array = str_split($line);

        $index = 0;
        $max   = 0;

        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i] > $max) {
                $index = $i;
                $max   = $array[$i];
            }
            if ($max === 9) {
                // Can't get higher
                break;
            }
        }
        // echo "First digit: " . $max . " at pos " . $index . "\n";

        $index2 = 0;
        $max2   = 0;

        for ($i = $index + 1; $i < count($array); $i++) {
            if ($array[$i] > $max2) {
                // $index2 = $i;
                $max2 = $array[$i];
            }
            if ($max2 === 9) {
                // Can't get higher
                break;
            }
        }
        // echo "Second digit: " . $max2 . " at pos " . $index2 . "\n";

        $result += (int)($max . $max2);
    }

    return $result;
}
