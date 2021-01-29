<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use DogTest\DogApi;

$dogCeo = new DogApi();

print_r($dogCeo->allBreeds());
//echo $dogCeo->random();
//print_r( $dogCeo->byBreed('gfdgsdfgd'));