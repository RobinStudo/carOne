<?php
class Vehicule{
    private $model;
    private $power;

    private $engine = false;
    private $speed = 0;
    private $state = 100;

    public function __construct( $model = 'Tesla Roadster', $power = 5 ){
        $this->model = $model;
        $this->power = $power;
    }

    public function start(){
        $this->engine = true;
    }

    public function stop(){
        $this->engine = false;
        $this->speed = 0;
    }

    public function inscreaseSpeed(){
        $this->speed += $this->power;
    }

    public function decreaseSpeed(){
        $this->speed -= rand( 1, $this->power );
        if( $this->speed < 0 ){
            $this->speed = 0;
        }
    }

    public function setDamage( $damage ){
        $this->state -= $damage;
        if( $this->state < 0 ){
            $this->state = 0;
        }
    }
}
