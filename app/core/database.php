<?php

class Database
{
    use Singleton;

    public $connection;

    public function __construct ()
    {
        $config = config( 'database' );

        $host = $config['host'];
        $dbname = $config['db'];
        $charset = $config['charset'];
        $user = $config['user'];
        $pass = $config['pass'];

        $options = array(
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        );

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            $this->connection = new PDO( $dsn, $user, $pass, $options );
        } catch (PDOException $error) {
            echo 'Connection failed: ' . $error->getMessage();
            exit;
        }
    }


    public function getConnection ()
    {
        return $this->connection;
    }
}