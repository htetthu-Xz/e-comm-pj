<?php



use Core\Response;

require('Router.php');


function dd($value) 
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
};

function urlIs($value) 
{
    if($_SERVER['REQUEST_URI'] == $value)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    $router = new Core\Router;
    if(! $condition){
        $router->abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH.$path;
}

function view($path, $attribute=[])
{
    extract($attribute);

    require base_path('views/'.$path);
}

function redirectTo($path = '')
{
    header("location: /{$path}");
    exit();
}
function setError($message)
{
    $_SESSION['errors'] = [$message];
}

function setNormalSuccess($message)
{
    $_SESSION['normalSuccess'] = $message;
}

function setDarkSuccess($message)
{
    $_SESSION['darkSuccess'] = $message;
}

function with($key, $message) {
    $_SESSION[$key] = $message;
}

function session($key) {
    if(isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return null;
    }
}

function checkAuthUser()
{
    return isset($_SESSION['auth_user']);
}

function checkAuthCus()
{
    return isset($_SESSION['customer']);
}

function getAuthCus()
{
    if(checkAuthCus()){
        return $_SESSION['customer'];
    }else {
        return null;
    }
}

function getAuthUser()
{
    if(checkAuthUser()){
        return $_SESSION['auth_user'];
    }else {
        return null;
    }
}

function bcrypt($val)
{
    return md5($val);
}

function getDateDb($date, $format) {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

function defaultProfile($user) {
    if($user['profile'] !== '') {
        return $user['profile'];
    } else {
        if($user['gender'] === 'M') {  
            return 'profile_images/defaultMale.jpg';
        } else {
            return 'profile_images/defaultFemale.jpg';
        }
    }
}

function defaultCustomerProfile($user) {
    if($user['profile'] !== '') {
        return $user['profile'];
    } else {
            return 'profile_images/defaultMale.jpg';
    }
}

function previousPage() {
	if( isset( $_SERVER['HTTP_REFERER'] ) ){
		return $_SERVER['HTTP_REFERER'];
	}else{
		return "/admin";
	}
}

function getOwner($userId, $users) {
    foreach($users as $user) {
        if($user['id'] === $userId) {
            return $user['name'];
        }
    }
}

function getShop($shopId, $shops) {
    foreach($shops as $shop) {
        if($shop['id'] === $shopId) {
            return $shop['name'];
        }
    }
}

function getCategory($category_id, $categories) {
    foreach($categories as $category) {
        if($category['id'] === $category_id) {
            return $category['name'];
        }
    }
}

function upload($imgFile, $path) {
    if(isset($imgFile['name']) && $imgFile['name'] != ''){
        // $profile_name = $path.\Carbon\Carbon::now()->format('U').str_replace(' ', '_', $imgFile['name']);
        $current_date = new DateTime();
        $uid = $current_date->format("U");
        $profile_name = $path.$uid.str_replace(' ', '_', $imgFile["name"]);
        $profile_tmp = $imgFile['tmp_name'];
        
        move_uploaded_file($profile_tmp, $profile_name);


        return $profile_name;
    }
}

function isActive($value) {
    if($value == 1) {
        return 'checked';
    }
}

function getImagesFromMultiSelect($files) {
    $images = [];
    $count = 0;
    $key = 0;

    foreach($files as $images_ary) {
        foreach($images_ary as $image) {
            $images[$count][$key] = $image;
            $count++;
        }
        $count = 0;
        $key++;
    }
    return $images;
}

function getCartProductQuantity() {
    if(isset($_SESSION['cart'])) {
        $quantities = array_column($_SESSION['cart'], 'quantity');
        $total = array_sum($quantities);
    
        if($total != 0 ) {
            return $total;
        } else {
            return 0;
        }
    }
}

function getEachProductTotalPrice($price, $p_id) {
    return $price * $_SESSION['cart'][$p_id]['quantity'];
}

function getSubTotal($carts) {
    $total = 0;
    foreach($carts as $cart) {
        foreach($_SESSION['cart'] as $item) {
            if($cart['id'] == $item['product_id']) {
                $total += $cart['price'] * $item['quantity'];
            }
        }
    }

    return $total;
}

function getOrderNumber($val) {
    if($val === false) {
        return 'O-100001';
    } else {
        $num = intval(substr($val['order_number'], 2)) + 1;
        return 'O-'.$num;
    }
}

function guidv4($data = null) {

    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);


    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s%s%s', str_split(bin2hex($data), 4));
}

