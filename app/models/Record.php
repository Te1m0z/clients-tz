<?php

class Record extends Model
{
    public static $table = 'records';

    public function __construct ()
    {
        parent::__construct();
    }

    public function all ()
    {
        $records = parent::all();

        function buildTree ( $array, $parentId = null )
        {
            $local_records = array();

            foreach ( $array as $element ) {
                if ( $element['parent_id'] == $parentId ) {
                    $children = buildTree( $array, $element['id'] );
                    if ( $children ) {
                        $element['children'] = $children;
                    }
                    $local_records[] = $element;
                }
            }
            return $local_records;
        }

        return buildTree( $records );
    }

    public function update ( $id, $title, $description )
    {
        $table = self::$table;

        $sql = "UPDATE `$table` SET title = :title, description = :description WHERE id = :id";

        try {
            $stmt = $this->db->prepare( $sql );
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }


    public function add ( $title, $description, $parent_id )
    {
        $table = self::$table;

        $sql = "
            INSERT INTO
                `records`
            (
             `parent_id`,
             `title`,
             `description`
            )
            VALUES (
                :parent_id,
                :title,
                :description
            )
        ";

        try {
            $stmt = $this->db->prepare( $sql );
            $parent_id = $parent_id ? $parent_id : null;
            $stmt->bindParam(':parent_id', $parent_id );
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo 'Error with execution SQL';
            exit;
        }
    }

}