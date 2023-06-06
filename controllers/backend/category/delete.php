<?php

use Core\App;
use Core\Database;

if(null !== session('auth_user')){

    $db = App::resolve(Database::class);

    $category = $db->query("SELECT * FROM categories WHERE id = :id",['id' => $_POST['delete_id']])->findOrFail();

    $db->query('DELETE FROM categories WHERE id = :id',['id' => $category['id']]);

    with('success', 'Category successfully Deleted.');
    redirectTo('admin/category');

} else {
    $router = new Core\Router;
    $router->abort(403);
}