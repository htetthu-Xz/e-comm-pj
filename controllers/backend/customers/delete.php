<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1){

    $db = App::resolve(Database::class);

    $customer = $db->query("SELECT * FROM customers WHERE id = :id",['id' => $_POST['customer_id']])->findOrFail();




    $db->query('DELETE FROM customers WHERE id = :id',['id' => $customer['id']]);

    with('success', 'Account successfully Deleted.');
    redirectTo('admin/customers');

} else {
    $router = new Core\Router;
    $router->abort(403);
}