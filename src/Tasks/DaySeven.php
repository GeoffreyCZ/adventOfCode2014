<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 07.12.2017
 * Time: 13:15
 */

namespace AdventOfCode\Tasks;

use AdventOfCode\Helpers\Parser;

class DaySeven implements DayI
{

    private $input;

    private $input2;

    public function solvePartOne()
    {
        $array = $this->input;
        $filtered = [];
        foreach ($array as $key => $line) {
            if (count($line) >= 3) {
                $filtered[] = str_replace(",", "", $line);
            }
        }

        $this->input = $filtered;

        $roots = [];
        foreach ($filtered as $subArray) {
            $roots[] = $subArray[0];
        }
        foreach ($roots as $key => $root) {
            foreach ($filtered as $key2 => $subArray) {
                for ($i = 3; $i < count($subArray); $i++) {
                    if ($root == $subArray[$i]) {
                        unset($roots[$key]);
                    }
                }
            }
        }
        $roots = array_values($roots);
        return $roots[0];
    }

    public function solvePartTwo()
    {
        $lines = explode(PHP_EOL, $this->input2);
        $arr = [];
        foreach ($lines as $line) {
            if (preg_match('/^(.*?) \((\d+)\)$/', $line, $matches)) {
                list($_, $name, $weight) = $matches;
                $arr[$name] = [
                    'name' => $name,
                    'weight' => (int)$weight,
                    'children' => [],
                ];
            }
            elseif (preg_match('/^(.*?) \((\d+)\) -> (.*)$/', $line, $matches)) {
                list($_, $name, $weight, $children) = $matches;
                $arr[$name] = [
                    'name' => $name,
                    'weight' => (int)$weight,
                    'children' => array_map('trim', explode(',', $children)),
                ];
            }
        }

        $root = '';
        foreach ($arr as $name => $el) {
            $chance = true;
            foreach ($arr as $el2) {
                if (in_array($name, $el2['children'])) {
                    $chance = false;
                }
            }
            if ($chance) {
                $root = $name;
            }
        }

        // calc total weight everywhere
        $calcWeight = function($el) use (&$calcWeight, &$arr) {
            $el['total'] = $el['weight'];
            foreach ($el['children'] as $child) {
                $calcWeight($arr[$child]);
                $el['total'] += $arr[$child]['total'];
            }
            $arr[$el['name']] = $el;
        };
        $calcWeight($arr[$root]);

        $consensus = 0;
        while (true) {
            $el = $arr[$root];
            if (!count($el['children'])) {
                // el has to change its weight to consensus
                return $el['weight']  + ($consensus - $el['total']);
            }

            $weights = array_map(function($e) use ($arr) { return $arr[$e]['total']; }, $el['children']);
            $min = min($weights);
            $max = max($weights);
            if ($min == $max) {
                // el has to change its weight
                return $el['weight']  + ($consensus - $el['total']);
            }
            $mins = array_filter($el['children'], function ($e) use ($min, $arr) { return $arr[$e]['total'] == $min; });
            $maxs = array_filter($el['children'], function ($e) use ($max, $arr) { return $arr[$e]['total'] == $max; });
            if (count($mins) == 1) {
                // this is the rogue child
                $consensus = $max;
                $root = end($mins);
            }
            else {
                // the max one is the rogue child
                $consensus = $min;
                $root = end($maxs);
            }
        }

        return -1;
    }

    public function resolve()
    {
        $parser = new Parser();
        $this->input = $parser->parseStringsByNewlineAndSpacesIntoArray('./Input/DaySeven');
        echo('Part one: ' . $this->solvePartOne());
        echo '<br>';
        $this->input2 = $parser->loadFromFile('./Input/DaySeven');
        echo('Part two: ' . $this->solvePartTwo());
    }


}