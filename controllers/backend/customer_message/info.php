<?php


use Core\App;
use Core\Database;

// dd($_GET['id']);
if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $db->query('UPDATE customer_messages SET is_read = 1 WHERE id = :id', ['id' => $_GET['id']]);

    $message = $db->query('SELECT customer_messages.*, customers.name as customer_name, customers.profile as profile FROM customer_messages LEFT JOIN customers ON customers.id = customer_messages.customers_id WHERE customer_messages.id = :id', ['id' => $_GET['id']])->find();
    //dd($message);
    view('backend/customer_message/info.view.php',['message' => $message]);
} else {
    (new Core\Router)->abort(403);
}