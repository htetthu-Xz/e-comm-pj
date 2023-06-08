<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')){

    $db = App::resolve(Database::class);

    $message = $db->query("SELECT * FROM customer_messages WHERE id = :id",['id' => $_POST['id']])->findOrFail();

    $db->query('DELETE FROM customer_messages WHERE id = :id', ['id' => $message['id']]);

    with('success', 'Message successfully Deleted.');
    redirectTo('admin/customer/message');

} else {
    $router = new Core\Router;
    $router->abort(403);
}