<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = $db->query('SELECT owner_id FROM shops WHERE id = :shop_id',['shop_id' => $_POST['shop_id']])->find();

if((null !== session('auth_user') && $userId['owner_id'] == session('auth_user')['id'] ) || session('auth_user')['is_admin'] == 1){

    $product = $db->query("SELECT * FROM products WHERE id = :id",['id' => $_POST['product_id']])->findOrFail();

    $db->query('DELETE FROM products WHERE id = :id',['id' => $product['id']]);

    with('success', 'Product successfully Deleted.');
    redirectTo('admin/products');

} else {
    $router = new Core\Router;
    $router->abort(403);
}