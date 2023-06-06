<?php


use Core\App;
use Core\Database;

if(false === checkAuthCus()) {
    redirectTo('login');
}

if(session('cart') == null) {
    redirectTo('cart_details');
}

if(session('customer')['state_id'] == null) {
    with('warning', 'Please set your address');
    redirectTo('user/profile');
}

$db = App::resolve(Database::class);

$carts;

$shipping = $db->query('SELECT shippings.id as id, states.name as state_name, districts.name as dis_name, townships.name as town_name, shippings.fee as fee 
                        FROM shippings LEFT JOIN states ON states.id = shippings.state_id 
                        LEFT JOIN districts ON districts.id = shippings.district_id 
                        LEFT JOIN townships ON shippings.township_id = townships.id WHERE shippings.township_id = :id', ['id' => session('customer')['township_id']])->find();


foreach(session('cart') as $key => $cart) {
    $carts[$key] = $db->query('SELECT * FROM products WHERE id = :id', [ 'id' => $cart['product_id']])->find();
}
// dd($_SESSION['cart'][$carts[9]]);
// dd($carts);

// dd($_SESSION);
// dd('hh');
view('site/cart/checkout.view.php', compact('carts', 'shipping'));