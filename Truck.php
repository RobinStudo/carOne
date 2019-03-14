<?php
class Truck extends Vehicule{
    private $hasTrailer = false;
    protected $capacity = 50;

    public function bonus(){
        if( $this->hasTrailer ){
            $this->state = 150;
        }else{
            $this->state = 100;
        }
    }
}
