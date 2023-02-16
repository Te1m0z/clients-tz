<?php

class WelcomeController extends Controller
{
    public function index ()
    {
        $record = new Record;

        $record_items = $record->all();

        echo view( 'welcome', array( 'records' => $record_items ) );
    }
}

return 'WelcomeController';