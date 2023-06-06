<?php


use Core\App;
use Core\Database;


if(checkAuthCus()) {
    $db = App::resolve(Database::class);

    $township = $db->query('SELECT * FROM townships WHERE id = :id', ['id' => session('customer')['township_id']])->find();

    $district = $db->query('SELECT * FROM districts WHERE id = :id', ['id' => session('customer')['district_id']])->find();

    $state = $db->query('SELECT * FROM states WHERE id = :id', ['id' => session('customer')['state_id']])->find();

    view('site/profile_edit.view.php', compact('township', 'district', 'state'));
}