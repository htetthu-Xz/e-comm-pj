<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 
// dd($_POST);


if(!Validator::email(($_POST['email']))) {
    array_push($errors, "Please enter a valid email!");
}

if(!Validator::string(($_POST['name']))) {
    array_push($errors, "Name field is required!");
}

if(empty($errors)) {

    if(isset($_FILES['profile']['name'])){
        $profile_name = upload($_FILES['profile'], 'customer_images/');
    }
    
    $db->query('UPDATE customers SET name = :name, email = :email, phone = :phone, profile = :profile, township_id = :township_id, district_id = :district_id, state_id = :state_id, updated_at = :updated_at WHERE id = :id ',[
        'id' => $_POST['cus_id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'profile' => $profile_name ? $profile_name : session('customer')['profile'],
        'township_id' => $_POST['township_id'] ? $_POST['township_id'] : session('customer')['township_id'],
        'district_id' => $_POST['district_id'] ? $_POST['district_id'] : session('customer')['district_id'],
        'state_id' => $_POST['state_id'] ? $_POST['state_id'] : session('customer')['state_id'],
        'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),
    ]);

$customer = $db->query('SELECT * FROM customers WHERE id = :id', ['id' => $_POST['cus_id']])->find();

unset($_SESSION['customer']);

$_SESSION['customer'] = $customer;
$_SESSION['update'] = true;

redirectTo('user/profile');
} else {

view('site/profile_edit.view.php',['errors' => $errors]);
}