<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $products = $db->query('SELECT products.id, products.name as product_name, products.shop_id as shop_id, shops.name as shop_name FROM products left join shops ON shops.id = products.shop_id')->get();
    $discount_types = $db->query('SELECT id,type FROM discount_types')->get();
    $discounts = $db->query('SELECT product_id FROM discounts')->get();
    // dd($discounts);
    view('backend/discount/create.view.php', compact('products', 'discount_types', 'discounts'));
} else {
    (new Core\Router)->abort(403);
}