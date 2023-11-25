<?php
use myfrm\Validator;

$title = 'Register';

$fillable = ['name', 'email', 'password'];

$data = load($fillable);
$rules = [
    'name' => [
        'required' => true,
        'min' => 5,
        'max' => 100,
    ],
    'email' => [
        'required' => true,
        'email' => 'email'
    ],
    'password' => [
        'required' => true,
        'min' => 6,
        'max' => 100
    ]
];
$validator = new Validator();
$validator->valid($data, $rules);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($db->query("SELECT COUNT(*) FROM users WHERE email = ?", [$data['email']])->fetchCol()) {
        $_SESSION['errors'] = 'This email is already taken';
    } else {
        if (!$validator->hasError()) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if ($db->query("INSERT INTO `users` (id, name, email, password) VALUES (NULL, :name, :email, :password)", [
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':password' => $data['password'],
            ])) {
                header('Location: login');
                $_SESSION['success'] = 'Validation Success';
            }
        } else {
            $_SESSION['errors'] = 'Validation error';
        }
    }
}
require VIEWS . '/register.tpl.php';
