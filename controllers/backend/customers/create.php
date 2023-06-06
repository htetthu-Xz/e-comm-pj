<?php

if(checkAuthUser()) {
    
    view('backend/customers/create.view.php',['customers' => $customers]);
} else {
    (new Core\Router)->abort(403);
}
