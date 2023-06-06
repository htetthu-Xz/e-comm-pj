<?php

if(false === checkAuthCus()) {
    redirectTo('login');
}

unset($_SESSION['cart']);

redirectTo('cart_details');