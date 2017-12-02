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

    private function findCaptchas($array) {
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

    private function sortArray($array) {
        $sortedArray = array();
        $length = count($array);
        for ($i = 0; $i < $length / 2; $i++) {
            $sortedArray[$i * 2] = $array[$i];
            $sortedArray[($i * 2) + 1] = $array[$i + 1];
        }
        return $sortedArray;
    }

    public function solvePartOne()
    {
        $array = $this->input;
        return $this->findCaptchas($array);
    }

    public function solvePartTwo()
    {
        $array = $this->input;
        $sortedArray = $this->sortArray($array);
        return $this->findCaptchas($sortedArray);
    }

    public function resolve() {
        $parser = new Parser();
        $this->input = $parser->parseIntoArray('./Input/DayOne');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }


}