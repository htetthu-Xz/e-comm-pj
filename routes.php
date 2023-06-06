<?php

#Admin

$router->get('/admin', 'controllers/backend/admin/index.php');
$router->get('/admin/accounts', 'controllers/backend/admin/account/index.php');
$router->get('/admin/accounts/create', 'controllers/backend/admin/account/create.php');
$router->post('/admin/accounts', 'controllers/backend/admin/account/store.php');
$router->delete('/admin/accounts/delete', 'controllers/backend/admin/account/delete.php');
$router->get('/admin/accounts/edit', 'controllers/backend/admin/account/edit.php');
$router->patch('/admin/accounts/update', 'controllers/backend/admin/account/update.php');
$router->post('/admin/login', 'controllers/backend/admin/login.php');
$router->get('/admin/logout', 'controllers/backend/admin/logout.php');

#shops

$router->get('/admin/shops', 'controllers/backend/shops/index.php');
$router->get('/admin/shops/create', 'controllers/backend/shops/create.php');
$router->post('/admin/shops/create', 'controllers/backend/shops/store.php');
$router->delete('/admin/shops/delete', 'controllers/backend/shops/delete.php');
$router->get('/admin/shops/edit', 'controllers/backend/shops/edit.php');
$router->patch('/admin/shops/update', 'controllers/backend/shops/update.php');


#products

$router->get('/admin/products', 'controllers/backend/products/index.php');
$router->get('/admin/products/create', 'controllers/backend/products/create.php');
$router->post('/admin/products/create', 'controllers/backend/products/store.php');
$router->delete('/admin/products/delete', 'controllers/backend/products/delete.php');
$router->get('/admin/products/edit', 'controllers/backend/products/edit.php');
$router->patch('/admin/products/update', 'controllers/backend/products/update.php');

#customers 

$router->get('/admin/customers', 'controllers/backend/customers/index.php');
$router->get('/admin/customers/create', 'controllers/backend/customers/create.php');
$router->post('/admin/customers/create', 'controllers/backend/customers/store.php');
$router->delete('/admin/customers/delete', 'controllers/backend/customers/delete.php');
$router->get('/admin/customers/edit', 'controllers/backend/customers/edit.php');
$router->patch('/admin/customers/update', 'controllers/backend/customers/update.php');

#shop slider

$router->get('/admin/shop_slider', 'controllers/backend/shop_slider/index.php');
$router->get('/admin/shop_slider/create', 'controllers/backend/shop_slider/create.php');
$router->post('/admin/shop_slider/create', 'controllers/backend/shop_slider/store.php');
$router->get('/admin/shop_slider/edit', 'controllers/backend/shop_slider/edit.php');
$router->delete('/admin/shop_slider/delete', 'controllers/backend/shop_slider/delete.php');
$router->delete('/admin/shop_slider/slider_delete', 'controllers/backend/shop_slider/delete_slider.php');
$router->patch('/admin/shop_slider/update', 'controllers/backend/shop_slider/update.php');

#categories

$router->get('/admin/category', 'controllers/backend/category/index.php');
$router->get('/admin/category/create', 'controllers/backend/category/create.php');
$router->post('/admin/category/create', 'controllers/backend/category/store.php');
$router->delete('/admin/category/delete', 'controllers/backend/category/delete.php');
$router->get('/admin/category/edit', 'controllers/backend/category/edit.php');
$router->patch('/admin/category/update', 'controllers/backend/category/update.php');

#discount

$router->get('/admin/discount', 'controllers/backend/discount/index.php');
$router->get('/admin/discount/create', 'controllers/backend/discount/create.php');
$router->post('/admin/discount/create', 'controllers/backend/discount/store.php');
$router->delete('/admin/discount/delete', 'controllers/backend/discount/delete.php');
$router->get('/admin/discount/edit', 'controllers/backend/discount/edit.php');
$router->patch('/admin/discount/update', 'controllers/backend/discount/update.php');

#order

$router->get('/admin/orders', 'controllers/backend/orders/index.php');
$router->get('/admin/orders/info', 'controllers/backend/orders/info.php');

#shipping

$router->get('/admin/shipping', 'controllers/backend/shipping/index.php');
$router->get('/admin/shipping/create', 'controllers/backend/shipping/create.php');
$router->get('/admin/shipping/state', 'controllers/backend/shipping/state.php');
$router->get('/admin/shipping/district', 'controllers/backend/shipping/district.php');
$router->get('/admin/shipping/township', 'controllers/backend/shipping/township.php');
$router->post('/admin/shipping/store', 'controllers/backend/shipping/store.php');
$router->delete('/admin/shipping/delete', 'controllers/backend/shipping/delete.php');
$router->patch('/admin/shipping/edit', 'controllers/backend/shipping/edit.php');


#****Site****

$router->get('/', 'controllers/site/home/index.php');
$router->get('/shop', 'controllers/site/shop/index.php');
$router->get('/about', 'controllers/site/about.php');
$router->get('/contact', 'controllers/site/contact.php');
$router->get('/product/search', 'controllers/site/shop/search.php');
$router->get('/product-details', 'controllers/site/shop/product-detail.php');
$router->get('/login', 'controllers/site/login.php');
$router->post('/login', 'controllers/site/auth.php');
$router->get('/register', 'controllers/site/register.php');
$router->post('/signup', 'controllers/site/store.php');
$router->get('/logout', 'controllers/site/logout.php');
$router->get('/user/profile', 'controllers/site/profile.php');
$router->get('/user/profile/edit', 'controllers/site/profile_edit.php');
$router->post('/user/profile/update', 'controllers/site/profile_update.php');
$router->get('/orders/invoice', 'controllers/site/invoice.php');

#cart

$router->post('/store', 'controllers/site/cart/store.php');
$router->get('/cart_details', 'controllers/site/cart/cart_details.php');
$router->get('/card_details/remove_card_item', 'controllers/site/cart/remove_cart_item.php');
$router->get('/card_details/empty_cart', 'controllers/site/cart/empty_cart.php');
$router->post('/card_details/update', 'controllers/site/cart/update.php');
$router->get('/cart_checkout', 'controllers/site/cart/checkout.php');
$router->get('/order_now', 'controllers/site/cart/order_now.php');


