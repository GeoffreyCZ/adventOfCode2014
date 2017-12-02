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
        $sum = 0;
        $array = $this->input;
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
        // TODO: Implement solvePartTwo() method.
    }

    public function resolve() {
        $parser = new Parser();
        $this->input = $parser->parseIntoArray('./src/Input/DayOne');
        echo('Part one: ' . $this->solvePartOne());
    }


}