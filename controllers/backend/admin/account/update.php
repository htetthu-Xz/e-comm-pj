<?php
    use Core\App;
    use Core\Database;
    use Core\Validator;

if(checkAuthUser()) {


    $db = App::resolve(Database::class);

    $errors = []; 

    if(!Validator::string(($_POST['name']))) {
        array_push($errors, "Name field is required!");
    }

    if(!Validator::email(($_POST['email']))) {
        array_push($errors, "Please enter a valid email!");
    }

    if(!Validator::string(($_POST['password']))) {
        array_push($errors, "Password field is required!");
    }

    if(Validator::password($_POST['password'])) {
        array_push($errors, "Password must be at least 8 characters!");
    }

    if(!Validator::string(($_POST['confirm_password']))) {
        array_push($errors, "Confirm Password field is required!");
    }

    if(!Validator::password_match($_POST['password'], $_POST['confirm_password'])) {
        array_push($errors, "Password and Confirm Password must be same!");
    }

    // dd($errors);

    // if(!Validator::phone($$_POST['phone'])) {
    //     array_push($errors, "Enter valid phone number!");
    // }

    if(empty($errors)) {

        if($_FILES['profile']['name'] != ''){
            $profile_name = 'profile_images/'.date('U').str_replace(' ', '_', $_FILES['profile']['name']);
            $profile_tmp = $_FILES['profile']['tmp_name'];

            move_uploaded_file($profile_tmp, $profile_name);
        }

        $db->query("UPDATE users SET name = :name, email = :email, password = :password, phone = :phone, address = :address, profile = :profile, is_admin = :is_admin, gender = :gender, updated_at = :updated_at WHERE id = :id", [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'profile' => $profile_name ?? '' ,
            'is_admin' => $_POST['is_admin'],
            'gender' => $_POST['gender'],
            'updated_at' => date('Y-m-d H-i-s')
        ]);

        with('success', 'Account successfully updated.');
        redirectTo('admin/accounts');
    }
} else {
    $router = new Core\Router;
    $router->abort();
}