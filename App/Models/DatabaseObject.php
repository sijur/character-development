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

    protected function getDSN()
    {
        return "mysql:host=$this->host;dbname=$this->dbName;charset=$this->charset";
    }

    public function verifyLogin( $user, $pass )
    {
        $dsn = $this->getDSN();

        $options = [];

        try {
            $pdo = new PDO( $dsn, $this->user, $this->pass, $options );
        } catch ( \PDOException $e ) {
            throw new \PDOException( $e->getMessage(), ( int )$e->getCode() );
        }

        $stmt = $pdo->prepare( "SELECT * FROM users WHERE user_name = ? AND password = ?" );
        $stmt->execute( [ $user, $pass ] );
        return $stmt->fetch( PDO::FETCH_ASSOC );
    }

    public function getUserInfo( $id )
    {
        $dsn = $this->getDSN();

        $options = [];

        try {
            $pdo = new PDO( $dsn, $this->user, $this->pass, $options );
        } catch ( \PDOException $e ) {
            throw new \PDOException( $e->getMessage(), ( int )$e->getCode() );
        }

        $stmt = $pdo->prepare(
            "SELECT 
                            user_name AS 'user',
                            first_name,
                            concat(first_name, ' ', last_name) AS 'full_name',
                            bio,
                            email_address,
                            is_dm,
                            dm_id,
                            is_player,
                            player_id
                        FROM
                            users
                        WHERE
                            id = ?"
                            );
        $stmt->execute( [ $id ] );
        return $stmt->fetch( PDO::FETCH_ASSOC );
    }
}