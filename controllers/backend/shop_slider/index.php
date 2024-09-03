<?php


use Core\App;
use Core\Database;


if(checkAuthUser()) {
    $db = App::resolve(Database::class);

    $shop_sliders = $db->query('SELECT COUNT(shop_sliders.id) AS slider_count, shops.name AS shop_name, shop_sliders.shop_id AS shop_id FROM shop_sliders LEFT JOIN shops ON shops.id = shop_sliders.shop_id GROUP BY shops.id, shops.name, shop_sliders.shop_id')->get();
    //dd($shop_sliders);
    view('backend/shop_slider/index.view.php',['shop_sliders' => $shop_sliders]);
} else {
    (new Core\Router)->abort(403);
} 