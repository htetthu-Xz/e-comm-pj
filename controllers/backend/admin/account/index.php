<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1) {

    $db = App::resolve(Database::class);

    $users = $db->query('SELECT * FROM users')->get();

    view('backend/account/index.view.php', compact('users'));
} else {  
    (new Core\Router)->abort(403);
}

