<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $discounts = $db->query('SELECT discounts.id as id, discounts.amount as amount, products.name as product_name, discount_types.type as discount_type, shops.name as shop_name
                                FROM discounts 
                                LEFT JOIN products ON products.id = discounts.product_id 
                                LEFT JOIN discount_types ON discount_types.id = discounts.discount_type
                                LEFT JOIN shops ON shops.id = discounts.shop_id')->get();

    view('backend/discount/index.view.php',['discounts' => $discounts]);
} else {
    (new Core\Router)->abort(403);
}