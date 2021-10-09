<?php
function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
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

function isValid($code)
{
    if (empty($code)) {
        return false; // if no string is here, we cut the function.
    }
    $params = [
        'secret'    => '6Ld7L6ocAAAAAI1zXCbyRZBcZJH4stJ8GKHtGhvU',
        'response'  => $code
    ];
    
    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // avoid certificate check in local environement
        $response = curl_exec($curl);
    } else {
        // if curl is unavailable, we use file_get_contents
        $response = file_get_contents($url);
    }

    if (empty($response) || is_null($response)) {
        return false;
    } 

    $json = json_decode($response);
    return $json->success;
}