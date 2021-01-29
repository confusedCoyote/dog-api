<?php

namespace DogTest;

class DogApi
{

    private $allBreedsObject;

    /**
     *
     */
    public function allBreeds() {
        $response = file_get_contents('https://dog.ceo/api/breeds/list/all');
        $this->allBreedsObject = json_decode($response)->message;
        return json_decode($response);
    }

    /**
     *
     */
    public function random() {
        $response = file_get_contents('https://dog.ceo/api/breeds/image/random');
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: ". $returnedResponse->message;
        }
    }

    /**
     *
     * @param string $breed
     */
    public function byBreed($breed) {
        $url = "https://dog.ceo/api/breed/" . $breed . "/images/random";
        $response = file_get_contents($url);
return $response;
        $returnedResponse = json_decode($response);
        return $returnedResponse;
            return $returnedResponse;
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return $returnedResponse;
            return "ERROR: " . $returnedResponse->message;
        }
        return json_decode($response);
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