<?php

namespace AdventOfCode\Tasks;

/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 02.12.2017
 * Time: 17:53
 */

use AdventOfCode\Helpers\Parser;

class DayOne implements DayI
{
    private $input;

    public function solvePartOne()
    {
        $array = $this->input;
        $sum = 0;
        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            if ($i !== $length - 1) {
                if ($array[$i] === $array[$i + 1]) {
                    $sum += $array[$i];
                }
            }
        }
        if ($array[0] === end($array)) {
            $sum += $array[0];
        }

        return $sum;
    }

    public function solvePartTwo()
    {
        $array = $this->input;
        $sum = 0;
        $length = count($array);
        for ($i = 0; $i < ($length / 2); $i++) {
            if ($array[$i] === $array[($length / 2) + $i]) {
                $sum += $array[$i];
            }
        }

        return $sum * 2;
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseStringIntoArray('./Input/DayOne');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }

}