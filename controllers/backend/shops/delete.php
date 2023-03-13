<?php 

use Core\App;
use Core\Database;

if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){

    $db = App::resolve(Database::class);

    $shop = $db->query("SELECT * FROM shops WHERE id = :id",['id' => $_POST['delete_id']])->findOrFail();




    $db->query('DELETE FROM shops WHERE id = :id',['id' => $shop['id']]);

    with('success', 'Shop successfully Deleted.');
    redirectTo('shops');

} else {
    $router = new Core\Router;
    $router->abort(403);
}