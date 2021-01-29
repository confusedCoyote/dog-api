<?php

namespace DogTest;

class DogApi
{
    public static function world()
    {
        return 'Hello World, Composer!';
    }




    /**
     *
     */
    public function allBreeds() {
        return "All Dogs";
        // https://dog.ceo/api/breeds/list/all
    }

    /**
     *
     */
    public function random() {
        // https://dog.ceo/api/breeds/image/random
    }

    /**
     *
     * @param string $breed
     */
    public function byBreed($breed) {
        // https://dog.ceo/api/breed/hound/images
        // https://dog.ceo/api/breed/hound/images/random
    }

    /**
     *
     * @param string $subBreed
     */
    public function bySubBreed($subBreed) {
        // https://dog.ceo/api/breed/hound/list
        // hhttps://dog.ceo/api/breed/hound/afghan/images/random
    }

}