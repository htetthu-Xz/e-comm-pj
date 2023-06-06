<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $categories = $db->query('SELECT categories.id, categories.name, categories.shop_id, shops.name as shop_name FROM categories left join shops ON shops.id = categories.shop_id ')->get();
    // dd($shop_sliders);
    view('backend/category/index.view.php',['categories' => $categories]);
} else {
    (new Core\Router)->abort(403);
}