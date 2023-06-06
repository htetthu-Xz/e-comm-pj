<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = []; 

if(!Validator::string(($_POST['dis_amount']))) {
    setError('Discount amount field is required!');
}

if(empty($_SESSION['errors'])) {

    $shop_id = $db->query('SELECT shop_id FROM products where id = :id',['id' => $_POST['product_id']])->findOrFail();
    // dd($_POST);
    $db->query('INSERT INTO discounts(amount, shop_id, product_id, discount_type, created_at, updated_at) 
                VALUES (:amount, :shop_id, :product_id, :discount_type, :created_at, :updated_at) ',[
                    'amount' => $_POST['dis_amount'],
                    'shop_id' => intval($shop_id['shop_id']),
                    'product_id' => intval($_POST['product_id']),
                    'discount_type' => $_POST['dis_type'],
                    'created_at' => Carbon::now()->format('Y-m-d H-i-s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H-i-s')
                ]);

    with('success', 'Discount successfully created.');
    redirectTo('admin/discount');
} else {
    redirectTo('admin/discount/create');
}