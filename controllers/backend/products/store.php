<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 

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
    array_push($errors, "One of products photo must be contain!");
}
// dd($_POST);
if(empty($errors)) {

    $name1 = upload($_FILES['image1'], 'product_images/');
    $name2 = upload($_FILES['image2'], 'product_images/');
    $name3 = upload($_FILES['image3'], 'product_images/');

    $db->query('INSERT INTO products (name, description, price, quantity, expiry_date, category_id, image1, image2, image3, shop_id, created_at, updated_at) 
                VALUES (:name, :description, :price, :quantity,  :expiry_date, :category_id, :image1, :image2, :image3, :shop_id, :created_at, :updated_at) ',[
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'price' => intval($_POST['price']),
                    'quantity' => intval($_POST['quantity']),
                    'category_id' => intval($_POST['category_id']),
                    'image1' => $name1 ?? '',
                    'image2' => $name2 ?? '',
                    'image3' => $name3 ?? '',
                    'shop_id' => intval($_POST['shop_id']),
                    'expiry_date' => Carbon::parse($_POST['expiry_date'])->format('Y-m-d-H:i:s') ?? null,
                    'created_at' => Carbon::now()->format('Y-m-d-H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d-H:i:s')
                ]);

    with('success', 'Products successfully added.');
    redirectTo('admin/products');
} else {
    $shops = $db->query("SELECT id,name FROM shops")->get();
    $categories = $db->query("SELECT id,name FROM categories")->get();
    view('backend/products/create.view.php',['errors' => $errors,'shops' => $shops, 'categories' => $categories]);
}