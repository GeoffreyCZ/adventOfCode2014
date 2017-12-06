<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 06.12.2017
 * Time: 13:13
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;


class DayFour implements DayI
{

    private $input;

    public function solvePartOne()
    {
        $numberOfValid = count($this->input);
        foreach ($this->input as $line) {
            $length = count($line);
            foreach ($line as $key => $value) {
                for ($i = $key + 1; $i < $length; $i++) {
                    if ($value == $line[$i]) {
                        $numberOfValid--;
                        break 2;
                    }
                }
            }
        }
        return $numberOfValid;
    }

    public function solvePartTwo()
    {
        // TODO: Implement solvePartTwo() method.
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseStringsByNewlineAndSpacesIntoArray('./Input/DayFour');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }


}