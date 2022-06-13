<?php

$api_key = '';
$secret_key = '';
$parameters = $_GET;
$hmac = $parameters['hmac'];
$parameters = array_diff_key($parameters, array('hmac' => ''));

echo print_r($parameters);