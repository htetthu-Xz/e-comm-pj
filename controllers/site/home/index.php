<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// dd($_SESSION['customer']);
$home_sliders = $db->query('SELECT image FROM shop_sliders WHERE id IN (9, 68,13)')->get();
$shops = $db->query('SELECT * FROM shops')->get();

view('site/home/index.view.php', compact('home_sliders', 'shops'));