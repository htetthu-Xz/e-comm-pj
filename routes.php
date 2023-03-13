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

$router->get('/shops', 'controllers/backend/shops/index.php');
$router->get('/shops/create', 'controllers/backend/shops/create.php');
$router->post('/shops/create', 'controllers/backend/shops/store.php');
$router->delete('/shops/delete', 'controllers/backend/shops/delete.php');
$router->get('/shops/edit', 'controllers/backend/shops/edit.php');
$router->patch('/shops/update', 'controllers/backend/shops/update.php');


#products

$router->get('/products', 'controllers/backend/products/index.php');
$router->get('/products/create', 'controllers/backend/products/create.php');

