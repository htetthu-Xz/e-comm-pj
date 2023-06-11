<?php

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

    $db->query('UPDATE shippings SET state_id = :state_id, district_id = :district_id, township_id = :township_id, fee = :fee, updated_at = :updated_at WHERE id = :id ',[
        'id' => $_POST['shipping_id'],
        'state_id' => $_POST['state_id'],
        'district_id' => $_POST['district_id'],
        'township_id' => $_POST['township_id'],
        'fee' => $_POST['fee'],
        'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),
    ]);
    with('success', 'Shipping successfully updated.');
    redirectTo('admin/shipping');

} else {

    $shipping = $db->query("SELECT * FROM shippings WHERE id = :id",[
        'id' => $_POST['shipping_id']
    ])->findOrFail();

    $states = $db->query("SELECT * FROM states")->get();

    $districts = $db->query("SELECT * FROM districts WHERE state_id = :id",[
        'id' => $shipping['id']
    ])->get();


    $townships = $db->query("SELECT * FROM townships WHERE district_id = :id",[
        'id' => $shipping['id']
    ])->get();
    view('backend/shipping/create.view.php', compact('errors', 'shipping', 'states', 'districts', 'townships'));
}