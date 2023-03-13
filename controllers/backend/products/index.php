<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);



    view('backend/products/index.view.php');
} else {
    (new Core\Router)->abort(403);
}
