<?php

require CORE . '/classes/Validator.php';

if (check_auth()) {
    redirect('secret');
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $data = load(['email', 'password']);
    $serv = $db->query("SELECT * FROM users WHERE email = :email",  [':email' => $data['email']])->find();

    if ($serv) {
        if (password_verify($data['password'], $serv['password'])) {
            foreach ($serv as $key => $value) {
                if ($key != 'password') {
                    $_SESSION['user'][$key] = $value;
                }
            }
            $_SESSION['success'] = 'You logged';
            if (isset($_SESSION['user'])) {
                redirect('index');
            }
        } else {
            $_SESSION['errors'] = 'Wrong email or password';
        }
    } else {
        $_SESSION['errors'] = 'Wrong email or password';
    }
}





require VIEWS . '/login.tpl.php';
