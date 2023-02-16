<?php

abstract class Model
{
    protected $db;

    private $whereParams = array();

    public function __construct ()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    // all, query method, get

    public function get ()
    {
        $table = static::$table;

        $sql = "SELECT ";

        $sql .= (isset( static::$received ) && sizeof(static::$received) > 0) ? implode( ",", static::$received ) : "*";

        $sql .= " FROM `$table` WHERE ";

        $rows = 0;

        foreach ( $this->whereParams as $param => $value ) {
            $sql .= ($rows === 0) ? "`$param` = '$value'" : " AND `$param` = '$value'";
            $rows++;
        }

        try {
            $stmt = $this->db->prepare( $sql );
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }

    public function all ()
    {
        $table = static::$table;

        $sql = "SELECT ";

        $sql .= (isset( static::$received ) && sizeof(static::$received) > 0) ? implode( ",", static::$received ) : "*";

        $sql .= " FROM `$table`";

        try {
            $stmt = $this->db->prepare( $sql );
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }

    public function where ( $column, $value )
    {
        $this->whereParams[$column] = $value;

        return $this;
    }

//    public function find ( $id )
//    {
//        $table = static::$table;
//
//        try {
//            $stmt = $this->db->prepare( $sql );
//            $stmt->execute( $params );
//            return $stmt->fetch();
//        } catch (PDOException $error) {
//            echo 'some err';
//            exit;
//        }
//        // return ;
//    }


    public function delete ( $id )
    {
        $table = static::$table;

        $sql = "DELETE FROM $table WHERE id = :id";

        try {
            $stmt = $this->db->prepare( $sql );
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }
}