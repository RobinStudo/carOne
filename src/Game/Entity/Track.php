<?php
namespace Game\Entity;

use PDO;

class Track{
    private static $db;

    private $id;
    private $name;
    private $length;
    private $location;

    public function __construct( $data ){
        $this->hydrate( $data );
    }

    // Exemple : [ 'id' => 1, 'name' => 'SPA', 'length' => 2800, 'location' => 'Belgique' ]
    private function hydrate( $data ){
        foreach( $data as $key => $value ){
            $method = 'set' . ucfirst( $key );

            if( method_exists( $this, $method ) ){
                $this->$method( $value );
            }
        }
    }

    public static function connect(){
        self::$db = new PDO( 'mysql:host=localhost;dbname=carOne', 'root', '' );
    }

    public static function getAll(){
        $result = self::$db->query( 'SELECT * FROM track' );

        $tracks = array();
        while( $data = $result->fetch( PDO::FETCH_ASSOC ) ){
            $tracks[] = new Track( $data );
        }

        return $tracks;
    }

    public static function getRandom(){
        $result = self::$db->query( 'SELECT * FROM track ORDER BY RAND() LIMIT 1' );

        $data = $result->fetch( PDO::FETCH_ASSOC );
        return new Track( $data );
    }

    public function getId(){
        return $this->id;
    }

    public function setId( $id ){
        $this->id = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function setName( $name ){
        $this->name = $name;
        return $this;
    }

    public function getLength(){
        return $this->length;
    }

    public function setLength( $length ){
        $this->length = $length;
        return $this;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation( $location ){
        $this->location = $location;
        return $this;
    }

    public function __toString(){
        return $this->name . ', ' . $this->location;
    }
}
