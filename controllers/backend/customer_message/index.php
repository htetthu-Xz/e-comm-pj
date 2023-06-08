<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $messages = $db->query('SELECT customer_messages.*, customers.name as customer_name FROM customer_messages LEFT JOIN customers ON customers.id = customer_messages.customers_id')->get();

    view('backend/customer_message/index.view.php',['messages' => $messages]);
} else {
    (new Core\Router)->abort(403);
}