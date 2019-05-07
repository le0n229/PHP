<?php


class Car // машина
{
    protected $age; // год выпуска
    protected $maxSpeed; // максимальная скорость
    protected $speed; // текущая скорость
    protected $weight; // вес машины
    protected $loadWeight; // грузоподъёмность
    protected $currentLoadWeight = 0; // текущая загрузка
    protected $engine = false; // включён двигатель или нет
    protected $transmission; //коробка передач
    protected $fullCurrentWeight; //полный вес машины

    public function __construct($age, $maxSpeed, $loadWeight, $weight)
    {
        $this->age = $age;
        $this->maxSpeed = $maxSpeed;
        $this->loadWeight = $loadWeight;
        $this->weight = $weight;
        $this->fullCurrentWeight = $this->weight + $this->loadWeight;
        $this->countWeight();
    }

    public function countWeight()
    { // посчитать текщий вес машины
        $this->fullCurrentWeight = $this->weight + $this->loadWeight;
    }

    public function toggleEngine()
    { //включить/dsrk. двигатель
        $this->engine = !($this->engine);
        $this->speed = 0;
    }

    public function accelerate()
    { // нажать педаль газа
        if ($this->engine) {
            $this->speed += ($this->maxSpeed / 20) * (100 / $this->fullCurrentWeight);

        }

    }

    public function brake()
    { // нажать педаль тормоз
        if ($this->speed > ($this->maxSpeed / 20) * (100 / $this->fullCurrentWeight)) {
            $this->speed -= ($this->maxSpeed / 20) * (100 / $this->fullCurrentWeight);
        } else {
            $this->speed = 0;
        }
    }

}

class SportCar extends Car
{ //спортивная машина
    protected $clearance; //дорожный просвет

    public function __construct($age, $maxSpeed, $loadWeight, $weight, $clearance)
    {
        parent::__construct($age, $maxSpeed, $loadWeight);
        $this->clearance = $clearance;
    }


    public function accelerate()
    { // нажать педаль газа
        if ($this->engine) {
            $this->speed += ($this->maxSpeed / 20) * (100 / $this->fullCurrentWeight) * (20 / $this->clearance);

        }

    }

}

class Truck extends Car
{ //грузовик
    protected $trailer; // наличие прицепа
    protected $trailerWeight; // вес пустового прицепа
    protected $trailerLoadWeight=0; // вес грузав прицепе

    public function __construct($age, $maxSpeed, $loadWeight, $weight, $trailer, $trailerWeight)
    {
        parent::__construct($age, $maxSpeed, $loadWeight);
        $this->trailer = $trailer;
        $this->trailerWeight = $trailerWeight;
    }

    public function countWeight()
    { // посчитать текщий вес машины
        $this->fullCurrentWeight = $this->weight + $this->loadWeight +$this->trailerWeight+$this->trailerLoadWeight;
    }
}