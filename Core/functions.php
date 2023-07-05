<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function render($view, $params = [], $layout = 'main')
{
    $view = "views/$view.php";
    $layout = "views/layouts/$layout.php";
    $content = '';
    if (file_exists($view)) {
        $content = renderFile($view, $params);
    } else {
        throw new \http\Exception\RuntimeException("view file $view not found.");
    }

    if (file_exists($layout)) {
        $content = renderFile($layout, compact($content));
    } else {
        throw new \http\Exception\RuntimeException("view file $view not found.");
    }
    return $content;
}


function renderFile($fileName, $params = [])
{
    ob_start();
    extract($params);
    if (file_exists($fileName)) {
        require $fileName;
    }

    return ob_get_clean();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($view, $params = [])
{
    extract($params);
    require base_path('views/' . $view . '.php');
}

function isRoute($route): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $route;
}

function login($user)
{
    $_SESSION['user'] = $user;
    session_regenerate_id(1);
}

function logout()
{
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
}

function redirect($route)
{
    header('location: ' . $route);
    exit;
}