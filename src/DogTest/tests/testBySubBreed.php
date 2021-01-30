<?php

error_reporting(0);

use DogTest\DogApi;

use PHPUnit\Framework\TestCase;

/**
 * Description of testBreeds
 *
 * @author Coyote
 */
class testBySubBreed extends TestCase
{

    public function testBySubBreedSuccess()
    {
        $dogCeo = new DogApi();
        $data = $dogCeo->bySubBreed('german');
        $this->assertStringContainsString('http', $data);
    }

    public function testBySubBreedFailure()
    {
        $dogCeo = new DogApi();
        $data = $dogCeo->bySubBreed('coyote');
        $this->assertStringContainsString('ERROR', $data);
    }
}
