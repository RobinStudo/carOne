<?php
class Car extends Vehicule{
    protected $capacity = 5;

    public function bonus(){
        $this->speed += 10; 
    }
}
