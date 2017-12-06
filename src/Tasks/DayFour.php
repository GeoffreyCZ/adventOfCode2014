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
        $numberOfValid = count($this->input);
        foreach ($this->input as $line) {
            $length = count($line);
            foreach ($line as $key => $value) {
                for ($i = $key + 1; $i < $length; $i++) {
                    $currentLineValue = $line[$i];
                    if (strlen($value) === strlen($currentLineValue)) {
                        $firstArrayOfChars = str_split($value, 1);
                        $secondArrayOfChars = str_split($currentLineValue, 1);
                        for ($j = 0; $j < count($firstArrayOfChars); $j++) {
                            for ($k = 0; $k < count($secondArrayOfChars); $k++) {
                                if ($firstArrayOfChars[$j] === $secondArrayOfChars[$k]) {
                                    unset($firstArrayOfChars[$j]);
                                    $firstArrayOfChars = array_values($firstArrayOfChars);
                                    unset($secondArrayOfChars[$k]);
                                    $secondArrayOfChars = array_values($secondArrayOfChars);
                                    $j = -1;
                                    $k = -1;
                                    break;
                                }
                            }
                        }
                        if ((count($firstArrayOfChars) === 0) && (count($secondArrayOfChars) === 0)) {
                            $numberOfValid--;
                            break 2;
//                        } else {
//                            echo $value . ' a ' . $currentLineValue;
//                            echo '<br>';
                        }
                    }
                }
            }
        }
        return $numberOfValid;
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