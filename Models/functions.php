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

function resetSession()
{
    if (count($_SESSION) > 3) {
        $_SESSION['project_owner_ref'] = '';
        $_SESSION['project_ref'] = '';
        $_SESSION['project_final_customer_name'] = '';
        $_SESSION['project_shipping_line'] = '';
        $_SESSION['sl_id'] = '';
        $_SESSION['project_country_dest'] = '';
        $_SESSION['project_POL'] = '';
        $_SESSION['project_POD'] = '';
        $_SESSION['POD_ID'] = '';
        $_SESSION['crate_data'] = '';
    }
}
