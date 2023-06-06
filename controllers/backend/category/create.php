<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {

    $db = App::resolve(Database::class);
    
    $shops = $db->query('SELECT id,name FROM shops')->get();

    view('backend/category/create.view.php',['shops' => $shops]);
} else {
    (new Core\Router)->abort(403);
}