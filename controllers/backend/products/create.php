<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {

    $db = App::resolve(Database::class);

    $shops = $db->query("SELECT id,name FROM shops")->get();

    $categories = $db->query('SELECT id,name FROM categories')->get();
    
    view('backend/products/create.view.php', ['shops' => $shops, 'categories' => $categories]);

} else {
    $router = new Core\Router;
    $router->abort(403);
}