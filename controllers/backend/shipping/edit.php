<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user')){
    
    $db = App::resolve(Database::class);

    // $shops = $db->query("SELECT * FROM shops")->get();
    $shipping = $db->query("SELECT * FROM shippings WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    $states = $db->query("SELECT * FROM states")->get();

    $districts = $db->query("SELECT * FROM districts WHERE state_id = :id",[
        'id' => $shipping['state_id']
    ])->get();


    $townships = $db->query("SELECT * FROM townships WHERE district_id = :id",[
        'id' => $shipping['district_id']
    ])->get();


    view('backend/shipping/edit.view.php', compact('shipping', 'states', 'districts', 'townships'));
} else {
    $router = new Core\Router;
    $router->abort(403);
}