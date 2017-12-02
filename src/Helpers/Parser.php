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

    private function loadFromFile($fileName) {
        return file_get_contents($fileName);
    }

    public function parseIntoArray($fileName) {
        $array = str_split ($this->loadFromFile($fileName));
        return $array;
    }

}