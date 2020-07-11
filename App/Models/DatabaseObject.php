<?php


namespace App\Models;


use App\DatabaseSettings;
use PDO;

class DatabaseObject
{
    protected $host;
    protected $user;
    protected $pass;
    protected $dbName;
    protected $charset = 'utf8mb4';

    public function __construct()
    {
        $db = $this->getConnectionInfo();
        $this->host = $db->host;
        $this->user = $db->dbUser;
        $this->pass = $db->password;
        $this->dbName = $db->dbName;
    }

    public function setup() {}

    protected function getConnectionInfo()
    {
        $dbInfo = new DatabaseSettings();
        return $dbInfo->setup();
    }

    public function verifyLogin( $user, $pass )
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=$this->charset";

        $options = [];

        try {
            $pdo = new PDO( $dsn, $this->user, $this->pass, $options );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $stmt = $pdo->prepare( "SELECT * FROM users WHERE user_name = ? AND password = ?" );
        $stmt->execute( [ $user, $pass ] );
        return $stmt->fetch( PDO::FETCH_ASSOC );
    }
}