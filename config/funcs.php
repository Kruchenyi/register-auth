<?php
function dump($data)
{
    echo '<pre>';
    var_dump($data);
    '</pre>';
}
function dd($data)
{
    dump($data);
    die;
}
function printR($data)
{
    echo '<pre>';
    print_r($data);
    '</pre>';
}
function h($data)
{
    return htmlspecialchars($data, ENT_QUOTES);
}
function load($fillable)
{
    $data = [];
    foreach ($_POST as $key => $v) {
        if (in_array($key, $fillable)) {
            $data[$key] = trim($v);
        }
    }
    return $data;
}

function old(string $data, $post = true): string
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$data]) ? h($load_data[$data]) : '';
}

function getAlert($data = '')
{
    if (!empty($_SESSION['success'])) {
        require VIEWS . '/inc/alert_success.tpl.php';
        unset($_SESSION['success']);
    }
    if (!empty($_SESSION['errors'])) {
        require VIEWS . '/inc/alert_error.tpl.php';
        unset($_SESSION['errors']);
    }
}


function check_auth()
{
    return isset($_SESSION['user']);
}

function redirect($url)
{
    if ($url) {
        header("Location: $url");
        exit();
    }
}
