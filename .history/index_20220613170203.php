<?php

include_once('includes/mysql_connect.php');

$parameters = $_GET;

// Use Query and SELECT statement to get the shop information
$query = "SELECT * FROM shops WHERE shop_url='" . $parameters['shop'] . "' LIMIT 1";
$result = $mysqli->query($query);

// Check if the number of rows is less than 1, if it's less than 1, then that means, we need to redirect the merchants 
// to the installation page.
echo $result->num_rows;
if($result->num_rows < 1) {
    header("Location: install.php?shop=" . $_GET['shop']);
    exit();
}

// Use fetch assoc function to get the records
$store_data = $result->fetch_assoc();
echo print_r($store_data);


echo "Hello World";