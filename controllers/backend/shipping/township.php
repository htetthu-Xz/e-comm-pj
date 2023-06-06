<?php

// dd($_GET['id']);

use Core\App;
use Core\Database;

// if(checkAuthUser()) {

    $db = App::resolve(Database::class);
    
    $townships = $db->query('SELECT * FROM townships WHERE district_id = :id', [
        'id' => $_GET['id']
    ])->get();

    // dd($districts);

    $response = [ 'data' => $townships];

    echo json_encode($response);

//     view('backend/shipping/create.view.php',['states' => $states]);
// } else {
//     (new Core\Router)->abort(403);
// }