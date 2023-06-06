<?php


use Core\App;
use Core\Database;


if(checkAuthCus()) {


    $db = App::resolve(Database::class);

    $township = $db->query('SELECT name FROM townships WHERE id = :id', ['id' => session('customer')['township_id']])->find();

    $district = $db->query('SELECT name FROM districts WHERE id = :id', ['id' => session('customer')['district_id']])->find();

    $state = $db->query('SELECT name FROM states WHERE id = :id', ['id' => session('customer')['state_id']])->find();

    $order = $db->query('SELECT orders.*, shops.name as shop_name, customers.name as customer_name
                        FROM orders LEFT JOIN shops ON shops.id = orders.shop_id
                        LEFT JOIN customers ON customers.id = orders.customer_id
                        WHERE orders.id = :id', ['id' => $_GET['id']])->find();

    $shops = $db->query('SELECT * FROM shops')->get();

    view('site/invoice.view.php', compact('order', 'township', 'district', 'state', 'shops'));
}