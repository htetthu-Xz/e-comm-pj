<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')){

    $db = App::resolve(Database::class);

    $shipping = $db->query("SELECT * FROM shippings WHERE id = :id",['id' => $_POST['delete_id']])->findOrFail();

    $db->query('DELETE FROM shippings WHERE id = :id',['id' => $shipping['id']]);

    with('success', 'Shipping successfully Deleted.');
    redirectTo('admin/shipping');

} else {
    $router = new Core\Router;
    $router->abort(403);
}