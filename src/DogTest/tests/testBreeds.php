<?php

use DogTest\DogApi;

use PHPUnit\Framework\TestCase;

/**
 * Description of testBreeds
 *
 * @author Coyote
 */
class testBreeds extends TestCase
{

    public function testAllBreedsReturns()
    {
        $dogCeo = new DogApi();
        $data = json_decode($dogCeo->allBreeds(), true);
        // May fail if breeds change
        $this->assertArrayHasKey('affenpinscher', $data);
    }
}
