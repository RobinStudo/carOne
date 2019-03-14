<?php
namespace Game\Vehicule;

class Motorcycle extends Vehicule{
    protected $capacity = 0;

    public function bonus(){
        $this->power = self::SUPERPOWER;
        $this->state = 75;
    }
}
