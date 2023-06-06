<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {

    $db = App::resolve(Database::class);
    
    $states = $db->query('SELECT * FROM states')->get();

    view('backend/shipping/create.view.php',['states' => $states]);
} else {
    (new Core\Router)->abort(403);
}