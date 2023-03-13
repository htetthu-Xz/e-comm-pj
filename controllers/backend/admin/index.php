<?php

if(false !== checkAuthUser() && session('auth_user')['is_admin'] == 1) {
    view('backend/index.view.php');
}else if(false !== checkAuthUser() && session('auth_user')['is_admin'] == 0){
    (new Core\Router)->abort(403);
} else if(false === checkAuthUser()){
    view('backend/login.view.php');
}