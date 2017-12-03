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
echo '<h3>==========</h3>';
echo '<h3>Day one</h3>';
$dayOne->resolve();

