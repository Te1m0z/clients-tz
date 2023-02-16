<?php


class DashboardController extends Controller
{
    public function index ()
    {
        $record = new Record;

        $record_items = $record->all();

        echo view( 'dashboard', array( 'records' => $record_items ) );
    }
}

return 'DashboardController';