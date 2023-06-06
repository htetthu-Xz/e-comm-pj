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

// dd($_POST);
if(empty($errors)) {
    $profile_image = $db->query('SELECT profile FROM customers WHERE id = :id',[
        'id' => $_POST['customer_id']
    ])->findOrFail();

    if($_FILES['profile']['name'] != '') {
        $upload_image = upload($_FILES['profile'], 'customer_images/');
    }
    $db->query('UPDATE customers SET name = :name, email = :email, password = :password, phone = :phone, address = :address, is_active = :is_active, profile = :profile, updated_at = :updated_at WHERE id = :id ',[
        'id' => $_POST['customer_id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => bcrypt($_POST['password']),
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'is_active' => isset($_POST['is_active']) ? 1 : 0,
        'profile' => $upload_image == ''? $profile_image['profile'] : $upload_image,
        'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),
    ]);

with('success', 'customers successfully updated.');
redirectTo('admin/customers');
} else {
view('backend/customers/edit.view.php',['errors' => $errors]);
}