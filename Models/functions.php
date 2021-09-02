<?php
function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

function loggedIn()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['u_id'])) {
        $_SESSION['flash']['danger'] = "access restricted, please login.";
        header('Location: login.php');
        exit();
    }
}

function token($digit)
{
    return bin2hex(random_bytes($digit));
}
