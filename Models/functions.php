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
    if (empty($_SESSION['u_id'])) {
        $_SESSION['flash']['danger'] = "access restricted, please login.";
        // header('Location: index.php');
        // exit();
    } else {
        // $_SESSION['flash'] = array();
    }
}

function token($digit)
{
    return bin2hex(random_bytes($digit));
}
