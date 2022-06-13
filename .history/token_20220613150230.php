<?php

$api_key = 'c34e6f7a44f1b087c43f3d784ee5fe66';
$secret_key = 'a037ff689103fe4a90c1fc0489463797';
$parameters = $_GET;
$hmac = $parameters['hmac'];
$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

$new_hmac = hash_hmac('sha256', http_build_query($parameters), $secret_key);

if(hash_equals($hmac, $new_hmac)){
  echo 'This is coming from shopify and legit.';  
}