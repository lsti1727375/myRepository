<?php

include_once 'app/Config.php';

class Conexion {

    private static $conexion;

    public static function openConexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'config.php';

                self::$conexion = new PDO('mysql:host='.serverName.'; dbname='.dataBaseName, username, password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec('SET CHARACTER SET utf8');
            } catch (Exception $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function closeConexion() {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function getConexion() {
        return self::$conexion;
    }

}

