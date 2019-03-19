<?php
namespace Game\Gameplay;

use Game\Entity\Track;

class Race implements \Countable{
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
        $this->startAt = new \DateTime();
    }

    public function start(){
        $turnRank = array();

        // Pour chaque tour
        for( $i=0; $i < $this->turn; $i++ ){

            // Pour chaque joueur
            foreach( $this->players as $key => $player ){
                // Calcule d'un coefficient de réussite
                $thd = $player->drive( $turnRank[ $key ] ?? 0 );
                // Stockage du coefficient par clé d'un joueur
                $turnRank[ $key ] = $thd;
            }

            // Tri par ordre décroissant des coefficients
            arsort( $turnRank, SORT_NUMERIC );
        }

        // Association du résultat aux joueurs
        foreach( $turnRank as $key => $value ){
            $this->ranking[] = $this->players[ $key ];
        }
    }

    public function getTrack(){
        return $this->track;
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

    public function count(){
        return $this->countPlayers();
    }

    public function countPlayers(){
        return count( $this->players );
    }

    public static function generate(){
        return new Race( Track::getRandom(), rand( 3, 80 ) );
    }
}
