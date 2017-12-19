<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DayTwelve implements DayI
{

	private $input;

	private $input2;

	public function solvePartOne()
	{
		$list = $this->input;
		$group = [0];
		foreach ($list as $key => $value) {
			unset($value[1]);
			$list[$key] = array_values($value);
		}
		$check = true;
		while ($check) {
			$check = false;
			foreach ($list as $key => $subArray) {
				foreach ($subArray as $value) {
					foreach ($group as $element) {
						if ($element === $value) {
							$group = array_merge($group, $subArray);
							$group = array_unique($group);
							unset($list[$key]);
							$list = array_values($list);
							$check = true;
							break 2;
						}
					}
				}
			}
		}

		return count($group);
	}

	public function solvePartTwo()
	{
		$input = $this->input2;
		$lines = explode(PHP_EOL, $input);
		$groups = [];
		foreach ($lines as $line) {
			if (preg_match('/(\d+) <-> (.*)/', $line, $matches)) {
				list($_, $a, $b) = $matches;
				$groups[$a] = array_map('trim', explode(',', $b));
			}
		}

		$subgroups = [];
		$rec = function($base, $root) use (&$rec, &$subgroups, $groups) {
			if (!array_key_exists($base, $subgroups)) {
				$subgroups[$base] = [];
			}
			if (!in_array($root, $subgroups[$base])) {
				$subgroups[$base][] = (int)$root;
				foreach ($groups[$root] as $ch) {
					$rec($base, $ch);
				}
			}
		};
		foreach ($groups as $base => $root) {
			$rec($base, $base);
			// prepare for unique
			sort($subgroups[$base]);
			// array_unique does not work on multidimensional arrays, so hack it
			$subgroups[$base] = implode('-', $subgroups[$base]);
		}
		$simple = array_unique($subgroups);

		return count($simple);
	}


	public function resolve()
	{
		$parser = new Parser();
		$this->input = $parser->parseIntsByNewlineAndSpacesIntoArray('./Input/DayTwelve');
		echo('Part one: ' . $this->solvePartOne());
		echo '<br>';
		$this->input2 = $parser->loadFromFile('./Input/DayTwelve');
		echo('Part two: ' . $this->solvePartTwo());
	}

}