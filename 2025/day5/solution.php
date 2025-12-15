<?php

declare(strict_types=1);

function solve_part1(string $input): int
{
	$result = 0;

	$ranges = [[], []];
	$startChecking = false;

	foreach (explode("\n", $input) as $line) {
		$line = rtrim($line, "\r");

		if ($startChecking === false) {
			if ($line != "") {
				[$start, $end] = array_map('intval', explode('-', $line));

				$ranges[0][] = $start;
				$ranges[1][] = $end;
			} else {
				# print_r($ranges);

				$count = count($ranges[0]);
				$startChecking = true;
			}
		} else {
			$n = (int)$line;
			for ($i = 0; $i < $count; $i++) {
				if ($n >= $ranges[0][$i] && $n <= $ranges[1][$i]) {
					# echo "\033[32m" . $n . " is fresh." . "\033[0m\n";

					$result++;
					break; # Because once we found a fresh range we don't need to check the others. If we did we'd double(multiple) count
				}
			}
		}
	}

	return $result;
}

function solve_part2(string $input): int
{
	$array = [];

	$stopChecking = false;

	foreach (explode("\n", $input) as $line) {
		$line = rtrim($line, "\r");

		if ($stopChecking === false) {
			if ($line != "") {
				[$start, $end] = array_map('intval', explode('-', $line));

				for ($i = $start; $i <= $end; $i++) {
					if (!in_array($i, $array)) {
						# echo $i . "\n";
						$array[] = $i;
					}
				}
			} else {
				$stopChecking = true;
			}
		}
	}

	return count($array);
}
