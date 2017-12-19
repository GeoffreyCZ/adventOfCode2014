<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DayNine implements DayI
{

	private $input;

	public function solvePartOne()
	{
		$stream = $this->input;
		$level = 0;
		$score = 0;
		$garbage = 0;
		$inGarbage = false;

		for ($i = 0; $i < count($stream); $i++) {
			$char = $stream[$i];
			if (!($inGarbage)) {
				if ($char === '{') {
					$level++;
				} elseif ($char === '}') {
					$score += $level;
					$level--;
				} elseif ($char === '<') {
					$inGarbage = true;
				}
			} else {
				if ($char === '!') {
					$i++;
				} elseif ($char === '>') {
					$inGarbage = false;
				} else {
					$garbage++;
				}
			}
		}
		return [$score, $garbage];
	}

	public function solvePartTwo()
	{
		// TODO: Implement solvePartTwo() method.
	}

	public function resolve()
	{
		$parser = new Parser();
		$this->input = $parser->parseStringIntoArray('./Input/DayNine');
		$result = $this->solvePartOne();
		echo('Part one: ' . $result[0]);
		echo '<br>';
		echo('Part two: ' . $result[1]);
	}
}