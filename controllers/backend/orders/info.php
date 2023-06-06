<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $order = $db->query('SELECT orders.id as id, orders.order_number as order_code, orders.amount as total, customers.name as cus_name, orders.order_detail as order_details, orders.created_at as created_at FROM orders left join customers on customers.id = orders.customer_id WHERE orders.id = :id', ['id' => $_GET['id']])->findOrFail();
// dd(json_decode($order['order_details'], JSON_OBJECT_AS_ARRAY));
    view('backend/orders/info.view.php',['order' => $order]);
} else {
    (new Core\Router)->abort(403);
}