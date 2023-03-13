<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){
    
    $db = App::resolve(Database::class);

    $user = $db->query("SELECT * FROM users WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    view('backend/account/edit.view.php', ['user' => $user]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}