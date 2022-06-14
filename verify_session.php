<?php

$token = $_POST['token'];

$token_array = explode('.', $token);
$assoc_token = array_combine(['header', 'payload', 'signature'], $token_array);

$secret_key = 'a037ff689103fe4a90c1fc0489463797';
$hash_token = hash_hmac('sha256', $assoc_token['header'] . '.' . $assoc_token['payload'], $secret_key, true);

$hash_token = rtrim(strtr(base64_encode($hash_token), '+/', '-_'), '=');

$response = array(
    'response' => array(
        'new_hash_signature' => $hash_token,
        'old_signature' => $assoc_token['signature'],
        'is_valid' => $hash_token == $assoc_token['signature'] ? true : false
        )
);

echo json_encode($response);