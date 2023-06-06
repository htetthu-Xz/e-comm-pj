<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')) {

    $db = App::resolve(Database::class);

    $categories = $db->query('SELECT id,name FROM categories')->get();
    $shops = $db->query("SELECT id,name FROM shops")->get();

    $product = $db->query("SELECT * FROM products WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    view('backend/products/edit.view.php', ['shops' => $shops, 'product' => $product, 'categories' => $categories]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}