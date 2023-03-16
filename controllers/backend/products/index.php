<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $products = $db->query('SELECT * FROM products')->get();
    $shops = $db->query('SELECT * FROM shops')->get();

    view('backend/products/index.view.php',['products' => $products, 'shops' => $shops]);
} else {
    (new Core\Router)->abort(403);
}
