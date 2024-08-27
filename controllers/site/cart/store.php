<?php

// dd(getCartProductQuantity());
//  unset($_SESSION['cart']);
if(false === checkAuthCus()) {
    redirectTo('login');
}

if($_POST['product_quantity'] == 0){
    redirectTo('product-details?id='.$_POST['product_id']);
}

$p_id = isset($_SESSION['cart']) ? array_column($_SESSION['cart'], 'product_id') : [];

if(in_array($_POST['product_id'], $p_id)) {
    $_SESSION['cart'][$_POST['product_id']]['quantity'] += $_POST['product_quantity'];
} else {
    $items = [
            'product_id' => $_POST['product_id'],
            'quantity' => $_POST['product_quantity']
    ];
    $_SESSION['cart'][$_POST['product_id']] = $items;
}

redirectTo('product-details?id='.$_POST['product_id']);

// dd($_SESSION);



