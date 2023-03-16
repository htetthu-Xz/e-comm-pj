<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = bcrypt($_POST['password']);

$user = $db->query(
        '
            SELECT 
                * 
            FROM users 
            WHERE email = :email 
            AND password = :password 
        ',
        [
            'email' => $email,
            'password' => $password,
        ])->find();

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

