<?php

if(session('customer') == null) {
    redirectTo('login');
}
// dd($_POST);
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 

if(!Validator::string(($_POST['msg']))) {
    array_push($errors, "Message field is required!");
}

if(empty($errors)) {
    $db->query('INSERT INTO customer_messages(customers_id, message, created_at, updated_at) 
                VALUES (:customers_id, :message, :created_at, :updated_at) ',[
                    'customers_id' => intval(session('customer')['id']),
                    'message' => $_POST['msg'],
                    'created_at' => date('Y-m-d H-i-s'),
                    'updated_at' => date('Y-m-d H-i-s')
                ]);
    with('success', 'Message successfully sent.');
    redirectTo('contact');
} else {
    view('site/contact.view.php',['errors' => $errors]);
}
