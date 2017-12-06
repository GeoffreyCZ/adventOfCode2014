<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 02.12.2017
 * Time: 18:09
 */

namespace AdventOfCode\Helpers;


class Parser
{

    private function loadFromFile($fileName)
    {
        return file_get_contents($fileName);
    }

    public function parseStringIntoArray($fileName)
    {
        $array = str_split($this->loadFromFile($fileName));
        return $array;
    }

    public function parseIntsByNewlineAndSpacesIntoArray($fileName)
    {
        $output = [];
        $array = explode("\n", $this->loadFromFile($fileName));
        foreach ($array as $key => $line) {
            $output[] = explode(' ', $line);
            foreach ($output[$key] as $innerKey => $value) {
                $output[$key][$innerKey] = intval($value);
            }
        }
        return $output;
    }

    public function parseStringsByNewlineAndSpacesIntoArray($fileName)
    {
        $output = [];
        $array = explode("\n", $this->loadFromFile($fileName));
        foreach ($array as $key => $line) {
            $output[] = preg_split('/\s+/',$line);
            foreach ($output[$key] as $innerKey => $value) {
                $output[$key][$innerKey] = strval($value);
            }
            array_pop($output[$key]);
        }
        return $output;
    }


}