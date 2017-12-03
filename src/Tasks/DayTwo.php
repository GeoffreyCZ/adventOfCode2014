<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 03.12.2017
 * Time: 14:50
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DayTwo implements DayI
{

    private $input;

    public function solvePartOne()
    {
        $checksum = 0;
        $array = $this->input;
        foreach ($array as $line) {
            sort($line);
            $min = $line[0];
            $max = $line[15];
            $checksum += ($max - $min);
        }
        return $checksum;
    }

    public function solvePartTwo()
    {
        $checksum = 0;
        $array = $this->input;
        foreach ($array as $key => $line) {
            rsort($line);
            for ($i = 0; $i <= 15; $i++) {
                for ($j = $i + 1; $j <= 15; $j++) {
                    if ($line[$i] % $line[$j] == 0) {
                        $checksum += ($line[$i] / $line[$j]);
                        break 2;
                    }
                }
            }
        }
        return $checksum;

    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseIntsByNewlineAndSpacesIntoArray('./Input/DayTwo');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }

}