<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 06.12.2017
 * Time: 15:48
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;


class DaySix implements DayI
{

    const MAX_BANKS = 16;

    private $input;

    private $diff;

    private function checkForLoop($history, $banks) {
        foreach ($history as $key => $line) {
            if ($line === $banks) {
                $this->diff = count($history) - $key;
                return true;
            }
        }
        return false;
    }

    public function solvePartOne()
    {
        $banks = $this->input;
        $history = [];
        while ($this->checkForLoop($history, $banks) === false) {
            $max = max($banks);
            $maxs = array_keys($banks, $max);
            $maxIndex = $maxs[0];
            $history[] = $banks;
            $banks[$maxIndex] -= $max;
            for ($i = 0; $i < $max; $i++) {
                $index = $maxIndex + 1 + $i;
                while ($index >= self::MAX_BANKS) {
                    $index -= self::MAX_BANKS;
                }
                $banks[$index]++;
            }
        }
        return count($history);
    }

    public function solvePartTwo()
    {
        $banks = $this->input;
        $history = [];
        while ($diff = $this->checkForLoop($history, $banks) === false) {
            $max = max($banks);
            $maxs = array_keys($banks, $max);
            $maxIndex = $maxs[0];
            $history[] = $banks;
            $banks[$maxIndex] -= $max;
            for ($i = 0; $i < $max; $i++) {
                $index = $maxIndex + 1 + $i;
                while ($index >= self::MAX_BANKS) {
                    $index -= self::MAX_BANKS;
                }
                $banks[$index]++;
            }
        }
        return $this->diff;
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseIntsBySpaceIntoArray('./Input/DaySix');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        echo('Part two: ' . $this->solvePartTwo());
    }

}