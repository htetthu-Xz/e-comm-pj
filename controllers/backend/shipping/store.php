<?php

// dd($_POST);

use Core\App;
use Carbon\Carbon;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 

if(!Validator::string(($_POST['fee']))) {
    array_push($errors, "Delivery fee is required!");
}

if(!is_numeric($_POST['fee'])) {
    array_push($errors, "Delivery fee should br numeric");
}

if(empty($errors)) {

    $db->query('INSERT INTO shippings(state_id, district_id, township_id, fee, created_at, updated_at) 
                VALUES (:state_id, :district_id, :township_id, :fee, :created_at, :updated_at) ',[
                    'state_id' => intval($_POST['state_id']),
                    'district_id' => intval($_POST['district_id']),
                    'township_id' => intval($_POST['township_id']),
                    'fee' => intval($_POST['fee']),
                    'created_at' => Carbon::now()->format('Y-m-d H-i-s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H-i-s')
                ]);
    with('success', 'Shipping successfully created.');
    redirectTo('admin/shipping');
} else {
    view('backend/shipping/create.view.php',['errors' => $errors]);
}