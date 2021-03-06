<?php

namespace DogTest;

/**
 *  Class to run the Dog API.
 *  All, except, allBreeds() will just return a url where allBreeds() will return a JSON array
 *  API documentation at https://dog.ceo/dog-api/documentation/
 */
class DogApi
{

    /**
     * Object that holds ALL the breeds, and sub-breeds, available
     *
     * @var object
     */
    private $allBreedsObject;


    /**
     * On init, read all breeds into an object
     */
    public function __construct()
    {
        $url = 'https://dog.ceo/api/breeds/list/all';
        $response = $this->getViaCurl($url);
        // We just need the message body of the JSON return
        $this->allBreedsObject = json_decode($response)->message;
    }

    /**
     * What breeds, and sub-breeds are available
     *
     * @return JSON
     */
    public function allBreeds()
    {
        // could also be set as getAllBreedsObject() as this is what it actually does
        return json_encode($this->allBreedsObject);
    }


    /**
     * Get a random dog image
     *
     * @return string
     */
    public function random()
    {
        $url = 'https://dog.ceo/api/breeds/image/random';
        $response = $this->getViaCurl($url);
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: No image found";
        }
    }


    /**
     * Get a random image's URL
     *
     * @param  string $breed Breed requested
     * @return string URL found
     */
    public function byBreed($breed)
    {
        $breed = strtolower($breed); // Has to be lower case otherwise we get a 404!
        $url = "https://dog.ceo/api/breed/" . $breed . "/images/random";
        $response = $this->getViaCurl($url);
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: No image found";
        }
    }


    /**
     * Grab a, random, image from a requested sub breed. This will only show one of the possible sub-breeds that
     * could be found
     *
     * @param  string $subBreed Sub breed requested
     * @return string URL found
     */
    public function bySubBreed($subBreed)
    {
        $subBreed = strtolower($subBreed); // Has to be lower case otherwise we get a 404!
        $getMainBreed = $this->searchJson($this->allBreedsObject, $subBreed);
        if ($getMainBreed == "") {
            return "ERROR: Breed not found";
        }
        $url = "https://dog.ceo/api/breed/" . $getMainBreed . "/" . $subBreed . "/images/random";
        $response = $this->getViaCurl($url);
        $returnedResponse = json_decode($response);
        if ($returnedResponse->status == "success") {
            return $returnedResponse->message;
        } else {
            return "ERROR: No image found";
        }
    }


    /**
     * Get the data from the API endpoint via cURL
     *
     * @param  string $url The URL endpoint
     * @return boolean|string
     */
    private function getViaCurl($url)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false); // Ignore any SSL issues
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        if (empty($buffer)) {
            return false;
        }
        return $buffer;
    }

    /**
     * JSON search for the parent breed.
     * e.g. "german" will return "pointer" - It will ONLY return the first sub-breed is found
     *
     * @param  object $haystack Array to be searched
     * @param  string $needle   Search string
     * @return type
     */
    private function searchJson($haystack, $needle)
    {
        foreach ($haystack as $key => $item) {
            if (!is_nan(intval($key)) && is_array($item)) {
                if (in_array($needle, $item)) {
                    return $key;
                }
            }
        }
        return null;
    }
}
