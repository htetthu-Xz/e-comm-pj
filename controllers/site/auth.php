<?php

use Core\App;
use Carbon\Carbon;
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
    
    if(session('customer')['is_active'] == 0) {
        $db->query('UPDATE customers SET is_active = :is_active, updated_at = :updated_at WHERE id = :id ',[
            'id' => session('customer')['id'],
            'is_active' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d-H:i:s'),

        ]);
    }

    redirectTo();
}

    array_push($errors, "These credential does not match our  records");
    view('site/login.view.php', compact('errors'));

