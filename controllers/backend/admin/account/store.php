<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 
// dd($_POST);
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

// dd($errors);

// if(!Validator::phone($$_POST['phone'])) {
//     array_push($errors, "Enter valid phone number!");
// }

if(empty($errors)) {
    if($_FILES['profile']['name'] != ''){
        $profile_name = 'profile_images/'.date('U').str_replace(' ', '_', $_FILES['profile']['name']);
        $profile_tmp = $_FILES['profile']['tmp_name'];

        move_uploaded_file($profile_tmp, $profile_name);
    }

    $db->query('INSERT INTO users(name, email, password, phone, address, profile, is_admin, gender, created_at, updated_at) 
                VALUES (:name, :email, :password, :phone, :address, :profile, :is_admin, :gender, :created_at, :updated_at) ',[
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'profile' => $profile_name ?? '' ,
                    'is_admin' => $_POST['is_admin'],
                    'gender' => $_POST['gender'],
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s')
                ]);
                //dd($_POST);
    with('success', 'Account successfully created.');
    redirectTo('admin/accounts');
} else {
    view('backend/account/create.view.php',['errors' => $errors]);
}