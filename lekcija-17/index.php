<?php

class Vehicles {

    protected $wheels;
    protected $color;

     // setter method
     public function setWheels($numberOfWheels) {
        $this->wheels = $numberOfWheels;
    }
    
    // getter method
    public function getWheels() {
        return $this->wheels;
    }       

     // setter method
     public function setColor($color) {
        $this->color = $color;
    }
    
    // getter method
    public function getColor() {
        return $this->color;
    }     
}

class Cars extends Vehicles {

    protected $door;

    // setter method
    public function setDoor($numberOfDoor) {
        $this->door = $numberOfDoor;
    }

    public function getDoor() {
        return $this->door;
    }

    // overwrite setter method
    public function setColor($color) {
        $this->color = strtoupper($color);
    }

}

$car1 = new Cars();
$car1->setDoor(4);
$car1->setColor('blue');
echo $car1->getColor();