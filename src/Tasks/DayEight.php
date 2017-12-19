<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;


class DayEight implements DayI
{

	private $input;

	private function incOrDec($incOrDec, $what, $howMuch)
	{
		if ($incOrDec === 'inc') {
			return $what + $howMuch;
		} else {
			return $what - $howMuch;
		}
	}

	public function solvePartOne()
	{
		$results = [];
		foreach ($this->input as $array) {
			if (!(array_key_exists($array[0], $results))) {
				$results[$array[0]] = 0;
			}
			if (!(array_key_exists($array[4], $results))) {
				$results[$array[4]] = 0;
			}
			switch ($array[5]) {
				case '<': {
					if ($results[$array[4]] < $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '>': {
					if ($results[$array[4]] > $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '<=': {
					if ($results[$array[4]] <= $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '>=': {
					if ($results[$array[4]] >= $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '==': {
					if ($results[$array[4]] == $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '!=': {
					if ($results[$array[4]] != $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}

			}
		}

		arsort($results);
		return array_values($results)[0];
	}

	public function solvePartTwo()
	{
		$results = [];
		$result = 0;
		foreach ($this->input as $array) {
			if (!(array_key_exists($array[0], $results))) {
				$results[$array[0]] = 0;
			}
			if (!(array_key_exists($array[4], $results))) {
				$results[$array[4]] = 0;
			}
			switch ($array[5]) {
				case '<': {
					if ($results[$array[4]] < $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '>': {
					if ($results[$array[4]] > $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '<=': {
					if ($results[$array[4]] <= $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '>=': {
					if ($results[$array[4]] >= $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '==': {
					if ($results[$array[4]] == $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
				case '!=': {
					if ($results[$array[4]] != $array[6]) {
						$results[$array[0]] = $this->incOrDec($array[1], $results[$array[0]], $array[2]);
					}
					break;
				}
			}

			foreach ($results as $value) {
				if ($result < $value) {
					$result = $value;
				}
			}
		}
		return $result;
	}

	public function resolve()
	{
		$parser = new Parser();
		$this->input = $parser->parseStringsByNewlineAndSpacesIntoArray('./Input/DayEight');
		echo('Part one: ' . $this->solvePartOne());
		echo '<br>';
		echo('Part two: ' . $this->solvePartTwo());
	}


}