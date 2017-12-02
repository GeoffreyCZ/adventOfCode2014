<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 02.12.2017
 * Time: 17:54
 */

require __DIR__ . '/vendor/autoload.php';

use AdventOfCode\Tasks\DayOne;

$dayOne = new DayOne();
echo '<h2>Day one</h2>';
$dayOne->resolve();
echo '<h2>==========</h2>';

