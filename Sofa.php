<?php

require_once 'Furniture.php';

class Sofa extends Furniture
{
    protected $seats;
    protected $armrests;
    protected $length_opened;

    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setArmrests($armrests)
    {
        $this->armrests = $armrests;
    }

    public function getArmrests()
    {
        return $this->armrests;
    }

    public function setLength_opened($length_opened)
    {
        $this->length_opened = $length_opened;
    }

    public function getLength_opened()
    {
        return $this->length_opened;
    }

    public function area_opened()
    {
        if (($this->getIs_for_sleeping() == 1)) {
            return $this->width * $this->getLength_opened();
        } else {
            return "This sofa is for sitting only, it has " . $this->getArmrests() . " armrests and " . $this->getSeats() . " seats";
        };
    }

}
