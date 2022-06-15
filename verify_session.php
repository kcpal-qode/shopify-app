<?php
include_once("includes/mysql_connect.php");

$token = $_POST['token'];

$token_array = explode('.', $token);
$assoc_token = array_combine(['header', 'payload', 'signature'], $token_array);

$payload = json_decode(base64_decode($assoc_token['payload']), true);

$shop = parse_url($payload['dest']);

$now = time() + 10;
$is_future = $payload['exp'] > $now ? true : false;
$is_past = $payload['nbf'] < $now ? true : false;

$secret_key = 'a037ff689103fe4a90c1fc0489463797';
$hash_token = hash_hmac('sha256', $assoc_token['header'] . '.' . $assoc_token['payload'], $secret_key, true);

$hash_token = rtrim(strtr(base64_encode($hash_token), '+/', '-_'), '=');

$query = "INSERT INTO sessions (shop_url, session_token) VALUES ('". $shop['host'] ."', '". $token ."') ON DUPLICATE KEY UPDATE session_token='". $token ."'";

if ($mysql->query($query)) {
    // If the query is successful
    // Then do something here
    array_push($response['response'], array("mysql_result" => true));
} else {
    // Otherwise, if it fails, then do something else
    array_push($response['response'], array("mysql_result" => false));
}

if ( !$is_future || !$is_past) {
    $response = array("Error" => "The token is expired.");
    echo json_encode($response);
    return;
}

if ($hash_token !== $assoc_token['signature'] ) {
    $response = array("Error" => "The token is invalid.");
    echo json_encode($response);
    return;
}

$response = array(
    'shop' => $shop,
    'success' => true
);

echo json_encode($response);

