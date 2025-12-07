<?php

declare(strict_types=1);

function solve_part1(string $input): int|string
{
    $result = 0;
    foreach (explode(',', $input) as $range) {
        [$start, $end] = array_map('intval', explode('-', $range));

        echo "Start: $start. End: $end.\n";

        for ($i = $start; $i <= $end; $i++) {
            // echo $i . "\n";
            if (is_invalid_id($i)) {
                echo "\033[31m$i is invalid.\033[0m\n";
                $result += $i;
            }
        }
    }

    return $result;
}

function is_invalid_id(int $n): bool
{
    $digits = [];

    while ($n != 0) {
        $digits[] = $n % 10;
        $n        = intdiv($n, 10);
    }

    # echo "Digits are [" . implode(", ", $digits) . "]\n";

    $numberOfDigits = count($digits);

    // If uneven number of digits then it CANNOT be invalid
    if ($numberOfDigits % 2 != 0) {
        return false;
    }

    $mid = $numberOfDigits / 2;


    for ($i = 0; $i < $mid; $i++) {
        $j = $i + $mid;
        # echo "Comparing $digits[$i] to $digits[$j]\n";
        if ($digits[$i] != $digits[$j]) {
            return false;
        }

    }

    return true;
}
