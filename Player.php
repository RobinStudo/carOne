<?php
class Player{
    private $name;
    private $team = '';
    private $level = 1;
    private $vehicule;
    private $state = 10;

    public function __construct( $name, $vehicule, $team = '', $level = 1 ){
        $this->name = $name;
        $this->vehicule = $vehicule;
        $this->team = $team;
        $this->level = $level;
        $this->state = $this->generateState();
    }

    public function drive( $base ){
        $random = $base + rand( 1, 20 ) + $this->level + $this->state;
        return $random;
    }

    public function getIdentity(){
        return $this->name . ' ' . $this->team;
    }

    public function increaseLevel( $earned = 1 ){
        $this->level += $earned;
    }

    public function getVehicule(){
        return $this->vehicule;
    }

    private function generateState(){
        return rand( 0, 10 );
    }
}
