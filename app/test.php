<?php
// Turn off all error reporting
//error_reporting(0);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use DogTest\DogApi;

$dogCeo = new DogApi();

echo PHP_EOL . "ALL BREEDS JSON" . PHP_EOL;
print_r($dogCeo->allBreeds()) . PHP_EOL;
echo PHP_EOL . "RANDOM IMAGE" . PHP_EOL;
echo $dogCeo->random() . PHP_EOL;
echo PHP_EOL . "IMAGE OF A BREED" . PHP_EOL;
echo $dogCeo->byBreed('pointer') . PHP_EOL;
echo PHP_EOL . "IMAGE OF A SUB BREED" . PHP_EOL;
echo $dogCeo->bySubBreed('german') . PHP_EOL;
