<?php

use Core\App;
use Core\Database;


if(false !== checkAuthUser() && session('auth_user')['is_admin'] == 1) {

    $db = App::resolve(Database::class);

    $product_count = $db->query('SELECT count(id) as count FROM products')->find();

    $total_sale = $db->query('SELECT count(id) as count FROM orders')->find();

    $sale_amount = $db->query('SELECT sum(amount) as sale_amount FROM orders')->find();

    $cus_count = $db->query('SELECT count(id) as count FROM customers')->find();


    // dd($product_count);
    view('backend/index.view.php', compact('product_count', 'total_sale', 'sale_amount', 'cus_count'));


} else if(false !== checkAuthUser() && session('auth_user')['is_admin'] == 0) {

    (new Core\Router)->abort(403);

} else if(false === checkAuthUser()) {

    view('backend/login.view.php');

}