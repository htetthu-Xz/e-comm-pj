<?php

// dd($_GET['id']);

use Core\App;
use Core\Database;

// if(checkAuthUser()) {

    $db = App::resolve(Database::class);
    
    $districts = $db->query('SELECT * FROM districts WHERE state_id = :id', [
        'id' => $_GET['id']
    ])->get();

    // dd($districts);

    $response = [ 'data' => $districts];

    echo json_encode($response);

//     view('backend/shipping/create.view.php',['states' => $states]);
// } else {
//     (new Core\Router)->abort(403);
// }