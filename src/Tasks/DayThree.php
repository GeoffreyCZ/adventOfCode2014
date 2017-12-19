<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

class DayThree implements DayI
{

	private $input;

	public function solvePartOne()
	{
		$root = 2;
		while ($root * $root <= $this->input) {
			$root++;
		}
		$root--;
		if ($root % 2 === 0) {
			$rest = $this->input - ($root * $root + 1);
			$layer = $root / 2;
			$numberOfNumbersInLayer = ($layer * 2) + 1;
			$position = [-($layer), $layer];
			if ($numberOfNumbersInLayer > $rest) {
				for ($i = 1; $i < $rest; $i++) {
					$position[1]--;
				}
			} else {
				for ($i = 1; $i < $numberOfNumbersInLayer; $i++) {
					$position[1]--;
					$rest--;
				}
				for ($i = 0; $i < $rest; $i++) {
					$position[0]++;
				}
			}
		} else {
			$rest = $this->input - ($root * $root);
			$layer = ($root - 1) / 2;
			$numberOfNumbersInLayer = ($layer * 2) + 1;
			$position = [$layer, -($layer)];
			if ($numberOfNumbersInLayer > $rest) {
				for ($i = 1; $i < $rest; $i++) {
					$position[1]++;
				}
			} else {
				for ($i = 0; $i <= $numberOfNumbersInLayer; $i++) {
					$position[0]--;
					$rest--;
				}
				for ($i = 0; $i < $rest; $i++) {
					$position[0]--;
				}
			}
		}
		return $steps = (abs($position[0]) + abs($position[1]));
	}

	public function solvePartTwo()
	{
		$x = 2;
		$y = 2;

		$grid = [];
		for ($i = 0; $i <= (2 * $y); $i++) {
			$grid[] = [];
		}
		$grid[$x][$y] = 1;
		$width = 1;

		$calculateGrid = function($grid, $x, $y) {
			$sum = 0;

			$sum += ($grid[$x - 1][$y] ?? 0);
			$sum += ($grid[$x - 1][$y + 1] ?? 0);
			$sum += ($grid[$x - 1][$y - 1] ?? 0);
			$sum += ($grid[$x][$y + 1] ?? 0);
			$sum += ($grid[$x][$y - 1] ?? 0);
			$sum += ($grid[$x + 1][$y] ?? 0);
			$sum += ($grid[$x + 1][$y - 1] ?? 0);
			$sum += ($grid[$x + 1][$y + 1] ?? 0);

			return $sum;
		};

		while (true) { // will error out eventually
			$width += 2;

			$y++; // move to the right
			$grid[$x][$y] = $calculateGrid($grid, $x, $y);
			if ($grid[$x][$y] > $this->input) {
				return $grid[$x][$y];
			}

			// go up (but not too much)
			for ($i = 0; $i < $width - 2; $i++) {
				$x--;

				$grid[$x][$y] = $calculateGrid($grid, $x, $y);
				if ($grid[$x][$y] > $this->input) {
					return $grid[$x][$y];
				}
			}

			// go left
			for ($i = 0; $i < $width - 1; $i++) {
				$y--;

				$grid[$x][$y] = $calculateGrid($grid, $x, $y);
				if ($grid[$x][$y] > $this->input) {
					return $grid[$x][$y];
				}
			}

			// go down
			for ($i = 0; $i < $width - 1; $i++) {
				$x++;

				$grid[$x][$y] = $calculateGrid($grid, $x, $y);
				if ($grid[$x][$y] > $this->input) {
					return $grid[$x][$y];
				}
			}

			// go right
			for ($i = 0; $i < $width - 1; $i++) {
				$y++;

				$grid[$x][$y] = $calculateGrid($grid, $x, $y);
				if ($grid[$x][$y] > $this->input) {
					return $grid[$x][$y];
				}
			}
		}

		return -1;
	}

	public function resolve()
	{
		$this->input = 368078;
		echo('Part one: ' . $this->solvePartOne());
		echo '<br>';
		echo('Part two: ' . $this->solvePartTwo());
	}


}