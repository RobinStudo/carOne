<?php
namespace Game\Entity;

interface Entity{
    public static function connect();
    public static function getAll();
    public function hydrate( $data );
    public function getId();
    public function setId( $id );
}
