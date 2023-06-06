<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user')){
    
    $db = App::resolve(Database::class);

    $shops = $db->query("SELECT * FROM shops")->get();
    $category = $db->query("SELECT * FROM categories WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    view('backend/category/edit.view.php', ['category' => $category, 'shops' => $shops]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}