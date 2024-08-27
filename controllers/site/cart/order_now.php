<?php

use Core\App;
use Core\Database;

if(false === checkAuthCus()) {
    redirectTo('login');
}

$db = App::resolve(Database::class);

$id = $db->query('SELECT * FROM orders ORDER BY Id DESC LIMIT 1')->find();

$delivery_fee = $db->query('SELECT fee FROM shippings WHERE township_id = :id', ['id' => session('customer')['township_id']])->find();
// dd($delivery_fee);
$carts;

foreach(session('cart') as $key => $cart) {
    $carts[] = $db->query('SELECT * FROM products WHERE id = :id', [ 'id' => $cart['product_id']])->find();
}

$orders = session('cart');

foreach ($carts as $cart) {
    foreach($orders as $key => $order) {
        if($cart['id'] == $order['product_id']) {
            $order_details[] = [
                'product_id' => $key,
                'product_name' => $cart['name'],
                'product_price' => $cart['price'],
                'product_quantity' => $order['quantity'],
                'total_price' => $cart['price'] * $order['quantity'],
                'shop_id' => $cart['shop_id']
            ];
        }
    }
}

if(session('payment') === 'cash') {
    $payment = 0;
} else {
    $payment = 1;
}

// dd($payment);


$db->query('INSERT INTO orders(order_number, shop_id, customer_id, amount, delivery_fee, order_detail, payment, created_at, updated_at) 
                VALUES (:order_number, :shop_id, :customer_id, :amount, :delivery_fee, :order_detail, :payment, :created_at, :updated_at) ',[
                    'order_number' => strtoupper(guidv4()),
                    'shop_id' => $carts[0]['shop_id'],
                    'customer_id' => getAuthCus()['id'],
                    'amount' => intval(getSubTotal($carts)) + intval($delivery_fee['fee']),
                    'delivery_fee' => $delivery_fee['fee'],
                    'order_detail' => json_encode($order_details),
                    'payment' => $payment,
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s')
                ]);

$_SESSION['order_confirm'] = true;
unset($_SESSION['cart']);
unset($_SESSION['payment']);
redirectTo();


