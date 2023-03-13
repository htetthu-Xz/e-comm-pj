<?php

if(null !== session('auth_user') && session('auth_user')['is_admin'] == 1) {
    view('backend/account/create.view.php');
} else {  
    (new Core\Router)->abort(403);
}