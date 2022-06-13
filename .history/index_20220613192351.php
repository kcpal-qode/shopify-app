<?php

include_once('includes/mysql_connect.php');
include_once('includes/shopify.php');

$shopify = new Shopify();

$parameters = $_GET;

// Use Query and SELECT statement to get the shop information
$query = "SELECT * FROM shops WHERE shop_url='" . $parameters['shop'] . "' LIMIT 1";
$result = $mysql->query($query);

// Check if the number of rows is less than 1, if it's less than 1, then that means, we need to redirect the merchants 
// to the installation page.

if($result->num_rows < 1) {
    header("Location: install.php?shop=" . $_GET['shop']);
    exit();
}

// Use fetch assoc function to get the records
$store_data = $result->fetch_assoc();

$shopify->set_url($parameters['shop']);
$shopify->set_token($store_data['access_token']);

$products = $shopify->rest_api('/admin/api/2021-04/products.json', array(), 'GET');
$response = json_decode($products['body'], true);

if (array_key_exists('errors', $response)) {
    header("Location: install.php?shop=" . $_GET['shop']);
    exit();
}