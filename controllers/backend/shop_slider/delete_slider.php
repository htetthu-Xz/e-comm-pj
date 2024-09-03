<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if(null !== session('auth_user')){
    $shop_id = $_POST['shop_id'];
    $slider = $db->query("SELECT * FROM shop_sliders WHERE id = :id",['id' => $_POST['delete_id']])->findOrFail();
    // dd($slider);
    $db->query('DELETE FROM shop_sliders WHERE id = :id',['id' => $slider['id']]);

    redirectTo('admin/shop_slider/edit?id='.$shop_id);

} else {
    $router = new Core\Router;
    $router->abort(403);
}