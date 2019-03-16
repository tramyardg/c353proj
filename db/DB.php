<?php

class DB
{
    private static $instance = null;
    private static $db_config_array;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        self::$db_config_array = parse_ini_file("../database.ini");
        if (empty(self::$instance)) {
            $db_info = array(
                "host" => self::$db_config_array["host"],
                "port" => self::$db_config_array["port"],
                "user" => self::$db_config_array["user"],
                "pass" => self::$db_config_array["password"],
                "name" => self::$db_config_array["dbname"],
                "charset" => self::$db_config_array["charset"]
            );
            try {
                self::$instance = new PDO(
                    "mysql:host=" .
                    $db_info['host'] . ';port=' .
                    $db_info['port'] . ';dbname=' .
                    $db_info['name'],
                    $db_info['user'],
                    $db_info['pass']
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }
        return self::$instance;
    }
}