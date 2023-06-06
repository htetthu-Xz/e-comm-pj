<?php

use Core\App;
use Core\Database;

$errors = [];

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = bcrypt($_POST['password']);

$customer = $db->query('SELECT * FROM customers WHERE email = :email AND password = :password ', [
                'email' => $email,
                'password' => $password,
            ])->find();

if(false !== $customer) {
    $_SESSION['customer'] = $customer;
    redirectTo();
}

    array_push($errors, "These credential does not match our  records");
    view('site/login.view.php', compact('errors'));

