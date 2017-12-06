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

    public function parseIntsByNewlineIntoArray($fileName)
    {
        $array = explode("\n", $this->loadFromFile($fileName));
        return $this->convertArrayOfStringsToArrayOfInts($array);
    }

    public function parseByNewlineIntoArray($fileName)
    {
        $array = explode("\n", $this->loadFromFile($fileName));
        return $array;
    }

    public function parseIntsByNewlineAndSpacesIntoArray($fileName)
    {
        $output = [];
        $array = $this->parseByNewlineIntoArray($fileName);
        foreach ($array as $key => $line) {
            $output[] = explode(' ', $line);
            foreach ($output[$key] as $innerKey => $value) {
                $output[$key][$innerKey] = intval($value);
            }
        }
        return $output;
    }

    public function convertArrayOfStringsToArrayOfInts($array)
    {
        $output = [];
        foreach ($array as $value) {
            $output[] = intval($value);
        }
        return $output;
    }

    public function parseStringsByNewlineAndSpacesIntoArray($fileName)
    {
        $output = [];
        $array = $this->parseByNewlineIntoArray($fileName);
        foreach ($array as $key => $line) {
            $output[] = preg_split('/\s+/', $line);
            foreach ($output[$key] as $innerKey => $value) {
                $output[$key][$innerKey] = strval($value);
            }
            array_pop($output[$key]);
        }
        return $output;
    }


}