<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$images = getImagesFromMultiSelect($_FILES['images']);

if ($images[1] == '') {
    array_push($errors, "Please insert at least one image!");
}

if (count($images) > 5) {
    array_push($errors, "Shop slider can only accept five images");
}

if (empty($errors)) {
    $is_upload_success = false;
    foreach ($images as $image) {
        if (isset($image[0])) {
            $profile_name = 'shop_sliders/' . \Carbon\Carbon::now()->format('U') . str_replace(' ', '_', $image['0']);
            $profile_tmp = $image['3'];
            if (!file_exists("shop_sliders/")) {
                mkdir("shop_sliders", 0777, true);
            }
            if (!move_uploaded_file($profile_tmp, $profile_name)) {
                $is_upload_success = false;
            } else {
                $is_upload_success = true;
            }
        }

        if ($is_upload_success) {
            $db->query('INSERT INTO shop_sliders (image, shop_id,  created_at, updated_at) 
            VALUES (:image, :shop_id, :created_at, :updated_at) ', [
                'image' => $profile_name,
                'shop_id' => intval($_POST['shop_id']),
                'created_at' => Carbon::now()->format('Y-m-d-H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d-H:i:s')
            ]);
        }else{
            die("Error here");
        }

        $count++;
    }

    with('success', 'Shop slider successfully added.');
    redirectTo('admin/shop_slider');
} else {
    $shops = $db->query("SELECT id,name FROM shops")->get();
    view('backend/shop_slider/create.view.php', ['errors' => $errors, 'shops' => $shops]);
}
