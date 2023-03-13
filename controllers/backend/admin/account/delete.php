<?php 

use Core\App;
use Core\Database;

if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){

    $db = App::resolve(Database::class);

    $user = $db->query("SELECT * FROM users WHERE id = :id",['id' => $_POST['delete_id']])->findOrFail();




    $db->query('DELETE FROM users WHERE id = :id',['id' => $user['id']]);

    with('success', 'Account successfully Deleted.');
    redirectTo('admin/accounts');

} else {
    $router = new Core\Router;
    $router->abort(403);
}