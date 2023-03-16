<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 
// dd($_POST['owner_id']);
if(!Validator::string(($_POST['name']))) {
    array_push($errors, "Products name is required!");
}

if(!Validator::string(($_POST['quantity']),1,1000)) {
    array_push($errors, "Products quantity is required!");
}

if(!is_numeric($_POST['quantity'])){
    array_push($errors, "Quantity field not allow characters!");
}

if(!Validator::string(($_POST['price']),1,1000)) {
    array_push($errors, "Products price is required!");
}

if(!is_numeric($_POST['price'])){
    array_push($errors, "Price field not allow characters!");
}

if(!Validator::string(($_POST['description']),1,1000)) {
    array_push($errors, "Products description is required!");
}

if(empty($_FILES['image1']['name'])) {
    array_push($errors, "One products photo must be contain!");
}

if(empty($errors)) {
    if($_FILES['image1']['name'] != ''){
        $profile_name = 'product_images/'.date('U').str_replace(' ', '_', $_FILES['image1']['name']);
        $profile_tmp = $_FILES['image1']['tmp_name'];

        move_uploaded_file($profile_tmp, $profile_name);
    }

    $db->query('INSERT INTO products (name, description, price, quantity, expiry_date, image1, image2, image3, shop_id, created_at, updated_at) 
                VALUES (:name, :description, :price, :quantity,  :expiry_date, :image1, :image2, :image3, :shop_id, :created_at, :updated_at) ',[
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'price' => intval($_POST['price']),
                    'quantity' => intval($_POST['quantity']),
                    'image1' => $profile_name ?? '',
                    'image2' => '',
                    'image3' => '',
                    'shop_id' => intval($_POST['shop_id']),
                    'expiry_date' => $_POST['expiry_date'] ?? null,
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s')
                ]);

    with('success', 'Products successfully added.');
    redirectTo('products');
} else {
    $shops = $db->query("SELECT id,name FROM shops")->get();
    view('backend/products/create.view.php',['errors' => $errors,'shops' => $shops]);
}