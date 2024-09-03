<?php

use Core\App;
use Core\Database;



if(null !== session('auth_user')) {

    $shop_id = $_GET['id'];

    $db = App::resolve(Database::class);

    $shops = $db->query("SELECT id,name FROM shops")->get();

    $sliders = $db->query("SELECT * FROM shop_sliders WHERE shop_id = :id",[
        'id' => $_GET['id']
    ])->get();
    // dd($sliders);
    view('backend/shop_slider/edit.view.php', ['shops' => $shops, 'sliders' => $sliders, 'shop_id' => $shop_id]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}