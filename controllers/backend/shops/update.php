<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = []; 
// dd($_POST['owner_id']);
if(!Validator::string(($_POST['shop_name']))) {
    array_push($errors, "Name field is required!");
}

if(!Validator::string(($_POST['description']),1,1000)) {
    array_push($errors, "Description field is required!");
}

if(empty($errors)) {
    if($_FILES['logo']['name'] != ''){
        $profile_name = 'shop_logos/'.date('U').str_replace(' ', '_', $_FILES['logo']['name']);
        $profile_tmp = $_FILES['logo']['tmp_name'];

        move_uploaded_file($profile_tmp, $profile_name);
    }
    //dd($_POST);
    $db->query('UPDATE shops SET name = :name, description = :description, open_time = :open_time, close_time = :close_time, logo = :logo, owner_id = :owner_id, updated_at = :updated_at WHERE id = :id ',[
                    'id' => $_POST['id'],
                    'name' => $_POST['shop_name'],
                    'description' => $_POST['description'],
                    'open_time' => $_POST['open_time'],
                    'close_time' => $_POST['close_time'],
                    'logo' => $profile_name ?? '',
                    'owner_id' => intval($_POST['owner_id']),
                    'updated_at' => date('Y-m-d H-i-s')
                ]);

    with('success', 'Shop successfully updated.');
    redirectTo('admin/shops');
} else {
    view('backend/shops/create.view.php',['errors' => $errors]);
}