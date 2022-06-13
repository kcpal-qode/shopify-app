<?php

$api_key = 'c34e6f7a44f1b087c43f3d784ee5fe66';
$secret_key = 'a037ff689103fe4a90c1fc0489463797';
$parameters = $_GET;
$shop_url = $parameters['shop'];
$hmac = $parameters['hmac'];
$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

$new_hmac = hash_hmac('sha256', http_build_query($parameters), $secret_key);

if(hash_equals($hmac, $new_hmac)){
  $access_token_endpoint  = 'https://' . $shop_url . '/admin/oauth/access_token';
  $var = array(
    'client_id' => $api_key,
    'client_secret' => $secret_key,
    'code' => $parameters['code']
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $access_token_endpoint);
  curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,  CURLOPT_POST, count($var));
  curl_setopt($ch,  CURLOPT_POSTFIELDS, http_build_query($var));

} else {
    echo 'This is not coming from shopify';
}