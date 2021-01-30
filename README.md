## Introduction

This can get an an image of a dog using the [dog ceo](https://dog.ceo/) API.

## Project Requirements

- PHP
- [Composer](https://getcomposer.org/)
- git

## Installation

Installation is simple & should only need to run the two commands below
~~~
git clone git@github.com:confusedCoyote/dog-api.git
composer install
~~~

## Functions

- Return all breeds (`$dogCeo->allBreeds()`)
- Random (`$dogCeo->random()`)
- Image by breed (`$dogCeo->byBreed('pointer')`)
- Image by sub-breed (`$dogCeo->bySubBreed('german')`)
 
A RESTful API is available at [dog ceo](https://dog.ceo/) which provides all the data required. You do not need to create an account nor authenticate in order to consume the API, however please be aware that this API is rate-limited.

## Tests

- phpUnit is used for testing of the functions. The tests can be located in the tests directory & phpUnit will be installed via Composer.

## Notes

- Functions that return an image are only returned as a text link and *not* as an IMG tag. This then can be styled via CSS & inserted into a page
- Error return strings all start with **ERROR** 
- Other data is returned as a JSON array than then can be handled via JavaScript / jQuery / PHP in a consistent way.