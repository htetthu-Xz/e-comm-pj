<?php 

use Core\App;
use Core\Database;

if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1) {

    $db = App::resolve(Database::class);

    $users = $db->query("SELECT * FROM users WHERE is_admin = '0'")->get();
    
    view('backend/shops/create.view.php', ['users' => $users]);

} else {
    $router = new Core\Router;
    $router->abort(403);
}