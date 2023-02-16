<?php


class Auth extends Database
{
    use Singleton;

    private $db;

    public function __construct ()
    {
        parent::__construct();

        $this->db = $this->getConnection();
    }

    public function attempt ( $login, $password )
    {
        $table = User::$table;

        $sql = "SELECT ";

        $sql .= (isset( User::$received ) && sizeof( User::$received ) > 0) ? implode( ",", User::$received ) : "*";

        $password = md5( $password );

        $sql .= " FROM `$table` WHERE `login` = '$login' AND `password` = '$password'";

        try {
            $stmt = $this->db->prepare( $sql );
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }
}

return 'Auth';