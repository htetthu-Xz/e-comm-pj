<?php

use Core\App;
use Core\Database;

if(false === checkAuthCus()) {
    redirectTo('login');
}

$db = App::resolve(Database::class);

// dd($_SESSION['cart']);

$carts;

foreach(session('cart') as $key => $cart) {
    $carts[$key] = $db->query('SELECT * FROM products WHERE id = :id', [ 'id' => $cart['product_id']])->find();
}
// dd($_SESSION['cart'][$carts[9]]);
// dd($carts);

// dd($_SESSION);
view('site/cart/cart_details.view.php', compact('carts'));