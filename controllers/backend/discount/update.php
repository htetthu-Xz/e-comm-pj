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
    // dd($shop_id);
    $db->query('UPDATE discounts SET amount = :amount, discount_type = :discount_type, product_id = :product_id, shop_id = :shop_id, updated_at = :updated_at WHERE id = :id ',[
        'id' => $_POST['id'],
        'amount' => $_POST['dis_amount'],
        'shop_id' => $shop_id['shop_id'],
        'product_id' => $_POST['product_id'],
        'discount_type' => $_POST['dis_type'],
        'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),
    ]);

with('success', 'Discount successfully updated.');
redirectTo('admin/discount');
} else {
redirectTo('admin/discount/edit?id='.$_POST['id']);
}