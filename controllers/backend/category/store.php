<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 
// dd($_POST);

if(!Validator::string(($_POST['name']))) {
    array_push($errors, "Category name field is required!");
}

if(empty($errors)) {

    $db->query('INSERT INTO categories(name, shop_id, created_at, updated_at) 
                VALUES (:name, :shop_id, :created_at, :updated_at) ',[
                    'name' => $_POST['name'],
                    'shop_id' => intval($_POST['shop_id']),
                    'created_at' => Carbon::now()->format('Y-m-d H-i-s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H-i-s')
                ]);
                //dd($_POST);
    with('success', 'Category successfully created.');
    redirectTo('admin/category');
} else {
    $shops = $db->query('SELECT * FROM shops')->get();
    view('backend/category/create.view.php',['errors' => $errors,'shops' => $shops]);
}