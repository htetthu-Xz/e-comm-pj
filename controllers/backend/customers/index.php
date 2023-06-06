<?php

use Core\App;
use Core\Database;

if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $customers = $db->query('SELECT * FROM customers')->get();

    view('backend/customers/index.view.php',['customers' => $customers]);
} else {
    (new Core\Router)->abort(403);
}

