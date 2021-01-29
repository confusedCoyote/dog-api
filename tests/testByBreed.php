<?php

error_reporting(0);

use DogTest\DogApi;

use PHPUnit\Framework\TestCase;

/**
 * Description of testBreeds
 *
 * @author Coyote
 */
class testByBreeds extends TestCase
{

    public function testByBreedSuccess()
    {
        $dogCeo = new DogApi();
        $data = $dogCeo->byBreed('pointer');
        $this->assertStringContainsString('http', $data);
    }

    public function testByBreedFailure()
    {
        $dogCeo = new DogApi();
        $data = $dogCeo->byBreed('coyote');
        $this->assertStringContainsString('ERROR', $data);
    }
}
