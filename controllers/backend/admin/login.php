<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// dd($_POST);
$email = $_POST['email'];
$password = bcrypt($_POST['password']);



$user = $db->query('SELECT * FROM users WHERE email = :email AND password = :password AND is_admin = :is_admin',[
            'email' => $email,
            'password' => $password,
            'is_admin' => $_POST['is_admin']
        ])->find();

        // dd($user);

if(false !== $user && $user['is_admin'] == 1) {
    $_SESSION['auth_user'] = $user;
    redirectTo('admin');
}

if(false !== $user && $user['is_admin'] == 0) {
    $_SESSION['auth_user'] = $user;
    redirectTo('shops');
}

    setError('These credential does not match our  records');
    redirectTo('admin');

