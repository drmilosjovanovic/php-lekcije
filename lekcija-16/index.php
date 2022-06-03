<?php
ini_set('display_errors','On');

class Vehicles {  

    protected $model;
    protected $color;
    protected $isMovable = true;    

    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return strtolower($this->model);
    }    

    public function setColor($color) {
        $this->color = $color;
    }

}

class Cars extends Vehicles {

    public function __construct($model) {
        $this->model = $model;
    }

    // overwrite method from parent class and add additional logic
    public function setModel($model) {
        $this->model = strtoupper($model);
    }
}

$car1 = new Cars('fiat');
$car1->setModel('fiat');

echo "<pre>";
print_r($car1);

echo $car1->getModel();