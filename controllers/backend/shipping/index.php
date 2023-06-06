<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $shippings = $db->query('SELECT shippings.id as id, states.name as state_name, districts.name as dis_name, townships.name as town_name, shippings.fee as fee 
                                FROM shippings LEFT JOIN states ON states.id = shippings.state_id 
                                LEFT JOIN districts ON districts.id = shippings.district_id 
                                LEFT JOIN townships ON shippings.township_id = townships.id')->get();

    view('backend/shipping/index.view.php',['shippings' => $shippings]);
} else {
    (new Core\Router)->abort(403);
}