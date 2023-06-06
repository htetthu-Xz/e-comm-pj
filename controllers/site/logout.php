<?php

if(false === checkAuthCus()) {
    redirectTo('login');
}

unset($_SESSION['customer']);
unset($_SESSION['cart']);

 redirectTo('login');