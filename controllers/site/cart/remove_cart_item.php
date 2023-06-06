<?php

if(false === checkAuthCus()) {
    redirectTo('login');
}

// dd($_SESSION);

unset($_SESSION['cart'][$_GET['id']]);

redirectTo('cart_details');