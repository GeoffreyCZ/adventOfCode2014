<?php
/**
 * @author Michal Kroupa <michalkrou@gmail.com>
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DayTen implements DayI
{

	private $input;

	private $input2;

	private $list;

	public function __construct() {
		for ($i = 0; $i < 256; $i++) {
			$this->list[$i] = $i;
		}
	}

	public function solvePartOne()
	{
		$position = 0;
		$skipSize = 0;
		$size = 256;
		foreach ($this->input as $length) {
			for ($i = 0; $i < $length; $i++) {
				$subArray[] = $this->list[($position + $i) % $size];
			}
			$subArray = array_reverse($subArray);
			for ($i = 0; $i < $length; $i++) {
				$this->list[($position + $i) % $size] = $subArray[$i];
			}
			$position += $length + $skipSize;
			$skipSize++;
		}
		return $this->list[0] *  $this->list[1];
	}

	public function solvePartTwo()
	{  $maxRange = 255;

		$lengths = [];
		if ($this->input2) {
			$lengths = array_map('ord', str_split($this->input2));
		}
		array_push($lengths, '17', '31', '73', '47', '23');

		$list = range(0, $maxRange);
		$size = $maxRange + 1;
		$skip = 0;
		$start = 0;
		for ($run = 0; $run < 64; $run++) {
			foreach ($lengths as $length) {
				$sublist = [];
				for ($i = 0; $i < $length; $i++) {
					$sublist[] = $list[($start + $i) % $size];
				}
				$sublist = array_reverse($sublist);
				for ($i = 0; $i < $length; $i++) {
					$list[($start + $i) % $size] = $sublist[$i];
				}
				$start += $length + $skip;
				$skip++;
			}
		}

		$hash = '';

		$chunks = array_chunk($list, 16);
		for ($i = 0; $i < 16; $i++) {
			$xorred = $chunks[$i][0];
			for ($j = 1; $j < 16; $j++) {
				$xorred ^= $chunks[$i][$j];
			}
			$hash .= sprintf('%02s', dechex($xorred));
		}

		return $hash;
	}

	public function resolve()
	{
		$parser = new Parser();
		$this->input = $parser->parseByCommasIntoArray('./Input/DayTen');
		$this->input2 = $parser->loadFromFile('./Input/DayTen');
		echo('Part one: ' . $this->solvePartOne());
		echo '<br>';
		echo('Part two: ' . $this->solvePartTwo());
	}


}