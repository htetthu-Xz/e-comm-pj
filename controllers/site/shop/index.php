<?php

    use Core\App;
    use Core\Database;

    $db = App::resolve(Database::class);

    $shop = $db->query('SELECT * FROM shops WHERE id = :id', [
        'id' => $_GET['id']
    ])->find();

    $categories = $db->query('SELECT * FROM categories WHERE shop_id = :id', [
        'id' => $_GET['id']
    ])->get();

    $shop_sliders = $db->query('SELECT shop_sliders.image, shops.id as shop_id, shops.name as shop_name, shops.description as shop_description FROM shop_sliders left join shops ON shops.id = shop_sliders.shop_id WHERE shop_id = :id', [
        'id' => $_GET['id']
    ])->get();

    $products = $db->query('SELECT * FROM products WHERE shop_id = :id', [
        'id' => $_GET['id']
    ])->get();

    // dd($products);


    view('site/shop/index.view.php', compact('shop', 'categories', 'shop_sliders', 'products'));