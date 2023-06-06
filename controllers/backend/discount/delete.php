<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')){

    $db = App::resolve(Database::class);

    $discount = $db->query("SELECT * FROM discounts WHERE id = :id",['id' => $_POST['discount_id']])->findOrFail();

    $db->query('DELETE FROM discounts WHERE id = :id',['id' => $discount['id']]);

    with('success', 'Discount successfully Deleted.');
    redirectTo('admin/discount');

} else {
    $router = new Core\Router;
    $router->abort(403);
}