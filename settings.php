<?php
define("ROOT", "C:\\xampp\\htdocs\\ChemGame");

//settings.php

class MyPDO
{

    protected static $instance;
    protected $pdo;

    public function __construct()
    {
        $host = '127.0.0.1';
        $db = 'chemgame';
        $user = 'root';
        $pass = '';
        $port = 3306;
        $charset = 'utf8mb4';
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $pass, $opt);

    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = [])
    {
        if (!$args) {
            return $this->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}

if (session_status() != PHP_SESSION_ACTIVE)
    session_start();