<?php
class Race{
    private $track;
    private $players = array();
    private $ranking = array();
    private $turn;
    private $weather = 0;
    private $startAt;

    public function __construct( $track, $turn = 3 ){
        $this->track = $track;
        $this->turn = $turn;
        $this->weather = $this->discoverWeather();
        $this->startAt = new DateTime();
    }

    public function start(){

    }

    public function getRanking(){
        return $this->ranking;
    }

    public function register( $player ){
        $this->players[] = $player;
    }

    private function discoverWeather(){
        return rand( 0, 5 );
    }
}
