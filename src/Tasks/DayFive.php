<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 06.12.2017
 * Time: 14:56
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;


class DayFive implements DayI
{

    private $input;

    public function solvePartOne()
    {
        $i = 0;
        $totalSteps = 0;
        $path = $this->input;
        while (array_key_exists($i, $path)) {
            $steps = $path[$i];
            $path[$i]++;
            $i += $steps;
            $totalSteps++;
        }
        return $totalSteps;
    }

    public function solvePartTwo()
    {
        $i = 0;
        $totalSteps = 0;
        $path = $this->input;
        while (array_key_exists($i, $path)) {
            $steps = $path[$i];
            if ($steps >= 3) {
                $path[$i]--;
            } else {
                $path[$i]++;
            }
            $i += $steps;
            $totalSteps++;
        }
        return $totalSteps;
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseIntsByNewlineIntoArray('./Input/DayFive');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }


}