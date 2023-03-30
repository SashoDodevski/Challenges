<?php

interface Printable
{
    public function print();
    public function sneakpeek();
    public function fullinfo();
}

class Furniture implements Printable
{
    protected $width;
    protected $length;
    protected $height;
    protected $is_for_seating;
    protected $is_for_sleeping;

    public function name()
    {
        echo get_class($this);
    }

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }


    public function setIs_for_seating($is_for_seating)
    {
        $this->is_for_seating = $is_for_seating;
    }

    public function getIs_for_seating()
    {
        return $this->is_for_seating;
    }

    public function setIs_for_sleeping($is_for_sleeping)
    {
        $this->is_for_sleeping = $is_for_sleeping;
    }

    public function getIs_for_sleeping()
    {
        return $this->is_for_sleeping;
    }

    public function area()
    {
        return $this->width * $this->length;
    }


    public function volume()
    {
        return $this->area() * $this->height;
    }


    public function print()
    {
        echo "{$this->name()}, ";
        echo "{$this->seatingOrSleeping()}, ";
        echo "{$this->area()}";
    }

    public function sneakpeek()
    {
        echo "{$this->name()}";
    }

    public function fullinfo()
    {
        echo "{$this->name()}, ";
        echo "{$this->seatingOrSleeping()}, ";
        echo "{$this->area()}, ";
        echo "width: {$this->width}, length: {$this->length}, height: {$this->height}";
    }

    public function seatingOrSleeping() {
        if ($this->getIs_for_seating() == TRUE) {
            echo "For seating only";
        } 
        if ($this->getIs_for_sleeping() == TRUE) {
            echo "For seating and sleeping";
        } 
    }
}
