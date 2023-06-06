<?php

use Core\App;
use Core\Database;


if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){
    
    $db = App::resolve(Database::class);

    $customer = $db->query("SELECT * FROM customers WHERE id = :id",[
        'id' => $_GET['id']
    ])->findOrFail();

    view('backend/customers/edit.view.php', ['customer' => $customer]);
} else {
    $router = new Core\Router;
    $router->abort(403);
}