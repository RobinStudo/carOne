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

    public function drive(){

    }


    public function increaseLevel( $earned = 1 ){
        $this->level += $earned;
    }

    private function generateState(){
        return rand( 0, 10 );
    }
}
