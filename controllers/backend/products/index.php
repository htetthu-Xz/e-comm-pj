<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $categories = $db->query('SELECT id,name FROM categories')->get();
    $products = $db->query('SELECT * FROM products')->get();
    $shops = $db->query('SELECT * FROM shops')->get();

    view('backend/products/index.view.php',['products' => $products, 'shops' => $shops, 'categories' => $categories]);
} else {
    (new Core\Router)->abort(403);
}
