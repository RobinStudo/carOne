<?php
namespace Game\Gameplay;

final class Player{
    private $id;
    private $name;
    private $team = '';
    private $level = 1;
    private $vehicule;
    private $state = 10;
    private static $counter = 0;

    public function __construct( $name, $vehicule, $team = '', $level = 1 ){
        $this->name = $name;
        $this->vehicule = $vehicule;
        $this->team = $team;
        $this->level = $level;
        $this->init();
    }

    public function __sleep(){
        self::$counter--;
        return [ 'name', 'team', 'level', 'vehicule' ];
    }

    public function __wakeup(){
        $this->init();
    }

    public static function save( $player ){
        $str = serialize( $player );
        $_SESSION['players'][] = $str;
    }

    public static function restore(){
        $saved = $_SESSION['players'];

        $players = array();
        foreach( $saved as $str ){
            $players[] = unserialize( $str );
        }

        $_SESSION['players'] = array();

        return $players;
    }

    private function init(){
        $this->id = $this->generateIdentifier();
        $this->state = $this->generateState();
        self::$counter++;
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

    public static function getCounter(){
        return self::$counter;
    }

    private function generateIdentifier(){
        return uniqid( md5( $this->name ) );

        // return rand();
        // return md5( $this->name . time() );
        // return uniqid();
        // return bin2hex( random_bytes( 10 ) );
    }
}
