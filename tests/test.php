<?php
// Turn off all error reporting
//error_reporting(0);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use DogTest\DogApi;

$dogCeo = new DogApi();

print_r($dogCeo->byBreed("Bulldog"));
