<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

$scriptTags = $shopify->rest_api('/admin/api/2022-04/script_tags.json', array(), 'GET');
$scriptTags = json_decode($scriptTags['body'], true);

echo print_r($scriptTags);
