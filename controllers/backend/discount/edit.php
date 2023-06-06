<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')) {

    $db = App::resolve(Database::class);

    $discount = $db->query("SELECT * FROM discounts WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();
    $discount_types = $db->query('SELECT id,type FROM discount_types')->get();
    $products = $db->query('SELECT products.id, products.name as product_name, products.shop_id as shop_id, shops.name as shop_name FROM products left join shops ON shops.id = products.shop_id')->get();

    view('backend/discount/edit.view.php', ['discount_types' => $discount_types, 'products' => $products, 'discount' => $discount]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}