<?php

class Cars {

    private $model;
    public $color;
    public $maxSpeed;

    public function setModel($model) {
        $model = $this->capitalize($model);
        $this->model = $model;
    }

    public function getModel() {
        return strtolower($this->model);
    }

    public function setColor($color) {
        $this->color = $color;
    }

    private function capitalize($word) {
        return strtoupper($word);
    }

}

echo "<pre>";

$car1 = new Cars();
$car1->setModel('mercedes');
$car1->color = "white";
print_r($car1);

$car2 = new Cars();
// $car2->model = "fiat";
$car2->setModel("fiat");
$car2->setColor('red');
print_r($car2);

echo "<br />";

echo $car1->getModel();