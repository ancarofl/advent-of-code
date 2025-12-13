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

function solve_part2(string $input): int|string
{
    $result = 0;

    foreach (explode("\n", $input) as $line) {
        $line = rtrim($line, "\r");
        echo $line . "\n";

        $array = str_split($line);
        $maxes = array_fill(0, 12, 0);

        $startIndex = 0;

        for ($i = 0; $i < 12; $i++) {
            $index = $startIndex;
            $max   = 0;

            // Stop early so there is still room for the remaining digits
            /* Eg. 10 chars, picking 1st digit (i=0), to still have 5 in total we can go up to 10-5
             * And the number would be made from digits at pos 5, 6, 7, 8, 9.
             * Then if picking 3rd digit (i=2), it would be 10-(5-2)=7 and so digits 345 are at pos 7 8 9.
             */
            $endIndex = count($array) - (12 - $i);

            for ($j = $startIndex; $j <= $endIndex; $j++) {
                if ($array[$j] > $max) {
                    $index = $j;
                    $max   = $array[$j];
                }
                if ($max === 9) {
                    // Can't get higher
                    break;
                }
            }

            $maxes[$i]  = $max;
            $startIndex = $index + 1;
        }

        $result += (int)implode('', $maxes);
    }

    return $result;
}
