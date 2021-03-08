<?php


namespace App;

class Model
{
    private $places = ['a'=>true];


    public function getPlaces()
    {
        return $this->places;
    }


    public function setPlaces($places): void
    {
        $this->places = $places;
    }
}
