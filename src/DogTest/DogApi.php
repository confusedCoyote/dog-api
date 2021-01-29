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
            return $returnedResponse;
        }
    }


    /**
     *
     * @param  string $breed
     * @return string
     */
    public function byBreed($breed)
    {
        $breed = strtolower($breed);
        $url = "https://dog.ceo/api/breed/" . $breed . "/images/random";
        $response = file_get_contents($url);
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: No image found";
        }
    }


    /**
     *
     * @param string $subBreed
     */
    public function bySubBreed($subBreed)
    {
        $subBreed = strtolower($subBreed);
        $getMainBreed = $this->searchJson($this->allBreedsObject, $subBreed);
        if ($getMainBreed == "") {
            return "ERROR: Breed not found";
        }
        $url = "https://dog.ceo/api/breed/" . $getMainBreed . "/" . $subBreed . "/images/random";
        $response = file_get_contents($url);
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: No image found";
        }
        return json_decode($response);
    }

    /**
     * JSON search for the parent breed.
     * e.g. "german" will return "pointer" - It will ONLY return the first sub-breed is found
     *
     * @param  type $obj
     * @param  type $value
     * @return type
     */
    private function searchJson($obj, $value)
    {
        foreach ($obj as $key => $item) {
            if (!is_nan(intval($key)) && is_array($item)) {
                if (in_array($value, $item)) {
                    return $key;
                }
            }
        }
        return null;
    }

}
