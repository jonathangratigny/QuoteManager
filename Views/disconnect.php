<?php

require '../Models/functions.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//reset session
$_SESSION = array();
$_SESSION['flash']['success'] = 'Logout succeed';
// kill all cookies
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }

header("Location: ../index.php");
