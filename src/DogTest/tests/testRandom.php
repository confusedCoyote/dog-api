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
        $data = $dogCeo->random();
        $this->assertStringContainsString('http', $data);
    }
}
