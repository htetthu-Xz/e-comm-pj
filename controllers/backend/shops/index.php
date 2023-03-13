<?php

use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $shops = $db->query('SELECT * FROM shops')->get();

    $users = $db->query('SELECT * FROM users')->get();

    view('backend/shops/index.view.php', compact('shops','users'));
} else {
    (new Core\Router)->abort(403);
}
