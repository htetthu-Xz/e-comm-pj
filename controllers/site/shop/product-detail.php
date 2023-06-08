<?php

use Core\App;
use Core\Database;

// dd(getCartProductQuantity());

$db = App::resolve(Database::class);

$product = $db->query('SELECT * FROM products WHERE id = :id', [
    'id' => $_GET['id']
])->find();


$shop = $db->query('SELECT * FROM shops WHERE id = :id', [
    'id' => $product['shop_id']
])->find();

$category = $db->query('SELECT * FROM categories WHERE id = :id', [
    'id' => $product['category_id']
])->find();

$products = $db->query('SELECT * FROM products WHERE id != :id AND shop_id = :shop_id', [
    'id' => $product['id'],
    'shop_id' => $shop['id']
])->get();


view('site/shop/product-detail.view.php', compact('product', 'shop', 'category', 'products'));