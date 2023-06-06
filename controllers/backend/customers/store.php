<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 


if(!Validator::string(($_POST['name']))) {
    array_push($errors, "Name field is required!");
}

if(!Validator::email(($_POST['email']))) {
    array_push($errors, "Please enter a valid email!");
}

if(!Validator::string(($_POST['password']))) {
    array_push($errors, "Password field is required!");
}

if(Validator::password($_POST['password'])) {
    array_push($errors, "Password must be at least 8 characters!");
}

if(!Validator::string(($_POST['confirm_password']))) {
    array_push($errors, "Confirm Password field is required!");
}

if(!Validator::password_match($_POST['password'], $_POST['confirm_password'])) {
    array_push($errors, "Password and Confirm Password must be same!");
}


// if(!Validator::phone($$_POST['phone'])) {
//     array_push($errors, "Enter valid phone number!");
// }

if(empty($errors)) {

    $profile_name = upload($_FILES['profile'], 'customer_images/');

    $db->query('INSERT INTO customers(name, email, password, phone, address, profile, created_at, updated_at) 
                VALUES (:name, :email, :password, :phone, :address, :profile, :created_at, :updated_at) ',[
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => bcrypt($_POST['password']),
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'profile' => $profile_name ?? '' ,
                    'created_at' => Carbon::now()->format('Y-m-d H-i-s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H-i-s')
                ]);
                //dd($_POST);
    with('success', 'Customers successfully created.');
    redirectTo('admin/customers');
} else {
    view('backend/customers/create.view.php',['errors' => $errors]);
}