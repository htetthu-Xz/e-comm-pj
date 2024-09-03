<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if(null !== session('auth_user')) {

    $shop = $db->query("SELECT * FROM shops WHERE id = :id",['id' => $_POST['shop_id']])->findOrFail();

    $db->query('DELETE FROM shop_sliders WHERE shop_id = :id',['id' => $shop['id']]);

    with('success', 'Shop sliders successfully Deleted.');
    redirectTo('admin/shop_slider');

} else {
    $router = new Core\Router;
    $router->abort(403);
}