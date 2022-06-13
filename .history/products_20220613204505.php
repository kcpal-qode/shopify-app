<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

$products = $shopify->rest_api('/admin/api/2022-04/products.json', array(), 'GET');
$products = json_decode($products['body'], true);

echo print_r($products);