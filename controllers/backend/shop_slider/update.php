<?php

use Core\App;
use Carbon\Carbon;
use Core\Database;

$db = App::resolve(Database::class);

$error = []; 

$image_counts = $db->query('SELECT count(shop_sliders.id) as slider_count FROM shop_sliders WHERE shop_id = :id', ['id' => $_POST['shop_id']])->find();



$images = getImagesFromMultiSelect($_FILES['images']);

// dd($images);

if($images['0']['0'] == '') {
    setError('Please insert at least one image!');
}

if(($image_counts['slider_count'] == 5)) {
    setError('There is full to add images yet !');
}

if(($image_counts['slider_count'] + count($images) > 5)) {
    setError('Shop slider can only accept five images and you can add now '.(5-$image_counts['slider_count']).' images.');
}


if(empty($_SESSION['errors'])) {
    // dd('here');
    $is_upload_success = false;
    foreach($images as $image) {
        if(isset($image[0])){
            $profile_name = 'shop_sliders/'.\Carbon\Carbon::now()->format('U').str_replace(' ', '_', $image['0']);
            $profile_tmp = $image['3'];           
            // move_uploaded_file($profile_tmp, $profile_name);
            print_r($image);
            if (!file_exists("shop_sliders/")) {
                mkdir("shop_sliders", 0777, true);
            }
            if (!move_uploaded_file($profile_tmp, $profile_name)) {
                $is_upload_success = false;
            } else {
                $is_upload_success = true;
            }
        }

        if($is_upload_success){
            $db->query('INSERT INTO shop_sliders (image, shop_id,  created_at, updated_at) 
            VALUES (:image, :shop_id, :created_at, :updated_at) ',[
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

    with('success', 'Shop slider successfully updated.');
    redirectTo('admin/shop_slider');
} else {
    redirectTo('admin/shop_slider/edit?id='.$_POST['shop_id']);
}
