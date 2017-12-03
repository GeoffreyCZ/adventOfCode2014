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
        // TODO: Implement solvePartTwo() method.
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseByNewlineAndSpacesIntoArray('./Input/DayTwo');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }

}