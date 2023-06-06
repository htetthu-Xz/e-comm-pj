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
    
    $db->query('UPDATE categories SET name = :name, shop_id = :shop_id, updated_at = :updated_at WHERE id = :id ',[
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'shop_id' => $_POST['shop_id'],
        'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),
    ]);

with('success', 'Category successfully updated.');
redirectTo('admin/category');
} else {
$shops = $db->query("SELECT * FROM shops")->get();
view('backend/category/edit.view.php',['errors' => $errors, 'shops' => $shops]);
}