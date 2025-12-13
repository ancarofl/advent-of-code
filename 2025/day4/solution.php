<?php

declare(strict_types=1);

function solve_part1(string $input): int
{
	$result = 0;

	$matrix = [];
	$rows = 0;
	$cols = 0;

	foreach (explode("\n", $input) as $r => $line) {
		$line = rtrim($line, "\r");

		$rows++;
		$cols = max($cols, strlen($line));

		for ($c = 0; $c < strlen($line); $c++) {
			$matrix[$r][$c] = ($line[$c] === '@') ? 1 : 0;
		}
	}

	echo "Matrix of " . $rows . " rows and " . $cols . " cols." . "\n";

	for ($i = 0; $i < $rows; $i++) {
		for ($j = 0; $j < $cols; $j++) {
			$count = 0;

			if ($matrix[$i][$j] === 0) {
				continue;
			}

			// 8 neighbours
			if (isset($matrix[$i - 1][$j - 1])) {
				if ($matrix[$i - 1][$j - 1] === 1) $count++;
			}
			if (isset($matrix[$i - 1][$j])) {
				if ($matrix[$i - 1][$j] === 1) $count++;
			}
			if (isset($matrix[$i - 1][$j + 1])) {
				if ($matrix[$i - 1][$j + 1] === 1) $count++;
			}

			if (isset($matrix[$i][$j - 1])) {
				if ($matrix[$i][$j - 1] === 1) $count++;
			}
			if (isset($matrix[$i][$j + 1])) {
				if ($matrix[$i][$j + 1] === 1) $count++;
			}

			if (isset($matrix[$i + 1][$j - 1])) {
				if ($matrix[$i + 1][$j - 1] === 1) $count++;
			}
			if (isset($matrix[$i + 1][$j])) {
				if ($matrix[$i + 1][$j] === 1) $count++;
			}
			if (isset($matrix[$i + 1][$j + 1])) {
				if ($matrix[$i + 1][$j + 1] === 1) $count++;
			}

			if ($count < 4) {
				echo "Can access at " . $i . " ; " . $j . "\n";
				$result++;
			}
		}
	}

	return $result;
}
