<?php


class DashboardRecordController extends Controller
{
    public function edit ()
    {
        $id = request()->get( 'id' );
        $title = request()->get( 'title' );
        $description = request()->get( 'description' );

        if ( empty( $title ) ) {
            response( array(
                'status' => false,
                'errors' => array(
                    'title' => 'Заголовок должен быть заполнен'
                )
            ) );
        }

        $record = new Record;

        $result = $record->update( $id, $title, $description );

        if ( $result ) {
            response( array(
                'status'  => true,
                'message' => 'Успешно обновлено'
            ) );
        }

        response( array(
            'status'  => false,
            'message' => 'Чтото пошло не так'
        ) );
    }

    public function delete ()
    {
        $id = request()->get( 'id' );

        if ( !isset( $id ) ) {
            response( array(
                'status' => false,
            ) );
        }

        $record = new Record;

        $result = $record->delete( $id );

        if ( $result ) {
            response( array(
                'status'  => true,
                'message' => 'Успешно удалено'
            ) );
        }

        response( array(
            'status'  => false,
            'message' => 'Чтото пошло не так'
        ) );
    }

    public function add ()
    {
        $parent_id   = request()->get( 'parent_id' );
        $title       = request()->get( 'title' );
        $description = request()->get( 'description' );

        if ( empty( $title ) ) {
            response( array(
                'status' => false,
                'errors' => array(
                    'title' => 'Заголовок должен быть заполнен'
                )
            ) );
        }

        $record = new Record;

        $result = $record->add( $title, $description, $parent_id );

        if ( $result ) {
            response( array(
                'status'  => true,
                'message' => 'Успешно Добавлено'
            ) );
        }

        response( array(
            'status'  => false,
            'message' => 'Чтото пошло не так'
        ) );
    }
}

return 'DashboardRecordController';