<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {

    $db = App::resolve(Database::class);

    $shops = $db->query("SELECT id,name FROM shops")->get();


    
    view('backend/products/create.view.php', ['shops' => $shops]);

} else {
    $router = new Core\Router;
    $router->abort(403);
}