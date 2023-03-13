<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){

    $db = App::resolve(Database::class);

    $users = $db->query("SELECT id,name FROM users WHERE is_admin = '0'")->get();

    $shop = $db->query("SELECT * FROM shops WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    // dd($shop);

    view('backend/shops/edit.view.php', ['users' => $users, 'shop' => $shop]);

} else {
    $router = new Core\Router;
    $router->abort(403);
}

