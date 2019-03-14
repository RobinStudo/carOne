<?php
class AutoLoader{

    public static function register(){
        spl_autoload_register( [ 'AutoLoader', 'load' ] );
    }

    public static function load( $class ){
        $path = str_replace( '\\', '/', $class );
        require_once 'src/' . $path . '.php';
    }
}
