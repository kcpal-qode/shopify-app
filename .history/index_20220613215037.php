<?php

include_once('includes/mysql_connect.php');
include_once('includes/shopify.php');


/**
 * =============================================
 *              CREATE THE VARIABLES:
 *               - $shopify
 *               - $parameters
 * =============================================
 */

$shopify = new Shopify();
$parameters = $_GET;

/**
 * =============================================
 *             CHECKING THR SHOPIFY STORE
 * =============================================
 */
include_once('includes/check_token.php');


/**
 * =============================================
 *     HERE DISPLAY ANYTHING ABOUT THE STORE
 * =============================================
 */

$access_scopes = $shopify->rest_api('/admin/oauth/access_scopes.json', array(), 'GET');
$response = json_decode($access_scopes['body'], true);

echo print_r($response);

?>

<?php include_once("header.php"); ?>



<?php include_once("footer.php"); ?>
