<?php

namespace DogTest;

class DogApi
{

    /**
     *
     * @var object
     */
    private $allBreedsObject;


    /**
     * On init, read all breeds
     */
    public function __construct()
    {
        $response = file_get_contents('https://dog.ceo/api/breeds/list/all');
        $message = json_decode($response)->message;
        $this->allBreedsObject = $message;
    }

    /**
     *
     * @return JSON
     */
    public function allBreeds()
    {
        // could also be set as getAllBreedsObject() as this is what it actually does
        return json_encode($this->allBreedsObject);
    }


    /**
     *
     * @return string
     */
    public function random()
    {
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
     * @param  string $breed
     * @return string
     */
    public function byBreed($breed)
    {
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
    public function bySubBreed($subBreed)
    {
        // https://dog.ceo/api/breed/hound/list
        // hhttps://dog.ceo/api/breed/hound/afghan/images/random
    }

}
