<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DayEleven implements DayI
{

	private $input;

	public function solvePartOne()
	{
		$path = 0;
		$directions = [
			'se' => 0,
			'sw' => 0,
			'ne' => 0,
			'nw' => 0,
			's' => 0,
			'n' => 0
		];
		for ($i = 0; $i < count($this->input); $i++) {
			switch ($this->input[$i]) {
				case 'sw': {
					$directions['sw']++;
					break;
				}
				case 'se': {
					$directions['se']++;
					break;
				}
				case 'nw': {
					$directions['nw']++;
					break;
				}
				case 'ne': {
					$directions['ne']++;
					break;
				}
				case 's': {
					$directions['s']++;
					break;
				}
				case 'n': {
					$directions['n']++;
					break;
				}
			}
		}

		if ($directions['sw'] > $directions['ne']) {
			$directions['sw'] -= $directions['ne'];
			$directions['ne'] = 0;
		} else if ($directions['sw'] < $directions['ne']) {
			$directions['ne'] -= $directions['sw'];
			$directions['sw'] = 0;
		} else if ($directions['sw'] === $directions['ne']) {
			$directions['sw'] = 0;
			$directions['ne'] = 0;
		}

		if ($directions['se'] > $directions['nw']) {
			$directions['se'] -= $directions['nw'];
			$directions['nw'] = 0;
		} else if ($directions['se'] < $directions['nw']) {
			$directions['nw'] -= $directions['se'];
			$directions['se'] = 0;
		} else if ($directions['se'] === $directions['nw']) {
			$directions['se'] = 0;
			$directions['nw'] = 0;
		}

		if ($directions['s'] > $directions['n']) {
			$directions['s'] -= $directions['n'];
			$directions['n'] = 0;
		} else if ($directions['s'] < $directions['n']) {
			$directions['n'] -= $directions['s'];
			$directions['s'] = 0;
		} else if ($directions['s'] === $directions['n']) {
			$directions['s'] = 0;
			$directions['n'] = 0;
		}

		if (($directions['sw'] === 0) && ($directions['ne'] !== 0)) {
			$path += $directions['n'];
			$path -= $directions['s'];
			$directions['n'] = 0;
			$directions['s'] = 0;
			if ($directions['ne'] > $directions['nw']) {
				$path += $directions['ne'] - $directions['nw'];
				$path += $directions['nw'];
				$directions['nw'] = 0;
				$directions['ne'] = 0;
			} else {
				$path += $directions['nw'] - $directions['ne'];
				$path += $directions['ne'];
				$directions['nw'] = 0;
				$directions['ne'] = 0;
			}
			if ($directions['ne'] > $directions['se']) {
				$path += $directions['ne'];
			} else {
				$path += $directions['se'];
			}
		}

		if (($directions['ne'] === 0) && ($directions['sw'] !== 0)) {
			$path -= $directions['n'];
			$path += $directions['s'];
			$directions['n'] = 0;
			$directions['s'] = 0;
			if ($directions['sw'] > $directions['se']) {
				$path += $directions['sw'] - $directions['se'];
				$path += $directions['se'];
				$directions['se'] = 0;
				$directions['sw'] = 0;
			} else {
				$path += $directions['se'] - $directions['sw'];
				$path += $directions['sw'];
				$directions['sw'] = 0;
				$directions['se'] = 0;
			}
			if ($directions['sw'] > $directions['nw']) {
				$path += $directions['sw'];
			} else {
				$path += $directions['nw'];
			}
		}

		return $path;

	}

	public function solvePartTwo()
	{
		$currentPosition = [0, 0, 0];
		$mostSteps = 0;
		foreach ($this->input as $step) {
			switch ($step) {
				case 'ne': {
					$currentPosition[0] -= 1;
					$currentPosition[1] += 1;
					break;
				}
				case 'n': {
					$currentPosition[0] -= 1;
					$currentPosition[2] += 1;
					break;}
				case 'nw': {
					$currentPosition[1] -= 1;
					$currentPosition[2] += 1;
					break;}
				case 'sw': {
					$currentPosition[0] += 1;
					$currentPosition[1] -= 1;
					break;}
				case 's': {
					$currentPosition[0] += 1;
					$currentPosition[2] -= 1;
					break;}
				case 'se': {
					$currentPosition[1] += 1;
					$currentPosition[2] -= 1;
					break;
				}
			}
			$currentSteps = $this->countSteps($currentPosition);
			if ($currentSteps > $mostSteps) {
				$mostSteps = $currentSteps;
			}
		}
		return $mostSteps;
	}

	private function countSteps ($position) {
		return $steps = max(abs($position[0]), abs($position[1]), abs($position[2]));
	}

	public function resolve()
	{
		$parser = new Parser();
		$this->input = $parser->parseByCommasIntoArray('./Input/DayEleven');
		echo('Part one: ' . $this->solvePartOne());
		echo '<br>';
		echo('Part two: ' . $this->solvePartTwo());
	}


}