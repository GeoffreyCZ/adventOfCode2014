<?php
/**
 * Created by PhpStorm.
 * User: Michal Kroupa
 * Date: 02.12.2017
 * Time: 17:54
 */

require __DIR__ . '/vendor/autoload.php';

use AdventOfCode\Tasks\DayOne;
use AdventOfCode\Tasks\DayTwo;
use AdventOfCode\Tasks\DayFour;
use AdventOfCode\Tasks\DayFive;
use AdventOfCode\Tasks\DaySix;
use AdventOfCode\Tasks\DayEight;

$dayEight = new DayEight();
echo '<h3>==========</h3>';
echo '<h3>Day 8</h3>';
$dayEight->resolve();

$daySix = new DaySix();
echo '<h3>==========</h3>';
echo '<h3>Day 6</h3>';
$daySix->resolve();


//$dayFive = new DayFive();
//echo '<h3>==========</h3>';
//echo '<h3>Day five</h3>';
//$dayFive->resolve();


$dayFour = new DayFour();
echo '<h3>==========</h3>';
echo '<h3>Day 4</h3>';
$dayFour->resolve();

$dayTwo = new DayTwo();
echo '<h3>==========</h3>';
echo '<h3>Day 2</h3>';
$dayTwo->resolve();

$dayOne = new DayOne();
echo '<h3>==========</h3>';
echo '<h3>Day 1</h3>';
$dayOne->resolve();

