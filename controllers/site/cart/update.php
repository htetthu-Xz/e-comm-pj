<?php
// dd($_POST);
// dd(getCartProductQuantity());
//  unset($_SESSION['cart']);
if(false === checkAuthCus()) {
    redirectTo('login');
}

if($_SESSION['cart'][$_POST['id']]['quantity'] > $_POST['product_quantity']) {
    $_SESSION['cart'][$_POST['id']]['quantity'] -= 1;
} else {
    $_SESSION['cart'][$_POST['id']]['quantity'] += 1;
}

// $_SESSION['cart'][$_POST['id']]['quantity'] = $_POST['product_quantity'];

// $p_id = array_column($_SESSION['cart'], 'product_id');

// if(in_array($_POST['product_id'], $p_id)) {
//     $_SESSION['cart'][$_POST['product_id']]['quantity'] += $_POST['product_quantity'];
// } else {
//     $items = [
//             'product_id' => $_POST['product_id'],
//             'quantity' => $_POST['product_quantity']
//     ];
//     $_SESSION['cart'][$_POST['product_id']] = $items;
// }

redirectTo('cart_details');

// dd($_SESSION);



