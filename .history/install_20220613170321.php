<?php
$_API_KEY = 'c34e6f7a44f1b087c43f3d784ee5fe66';
$_NGROK_URL = 'https://3845-202-79-34-246.ngrok.io';
$shop = $_GET['shop'];
$scopes = 'read_products,write_products,read_orders,write_orders';
$redirect_uri= $_NGROK_URL . '/elana/token.php';
$nonce = bin2hex(random_bytes(12));
$access_mode = 'per-user';

$oauth_url = 'https://'. $shop .'/admin/oauth/authorize?client_id='. $_API_KEY .'&scope='. $scopes .'&redirect_uri='. $redirect_uri .'&state='. $nonce .'&grant_options[]=' . $access_mode;

header("Location: " . $oauth_url);
exit();