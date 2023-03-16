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
    return $_SESSION[$key];
}

function checkAuthUser()
{
    return isset($_SESSION['auth_user']);
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

// function getShopID($shopId, $shops) {
//     foreach($shops as $shop) {
//         if($shop['id'] === $shopId) {
//             return $shop['id'];
//         }
//     }
// }