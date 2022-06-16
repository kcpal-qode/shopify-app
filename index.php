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
 *             CREATE A BILLING CHARGE
 * =============================================
 */
// include_once('billing/oneTimeBilling.php');
include_once('billing/recurringBilling.php');


/**
 * =============================================
 *     HERE DISPLAY ANYTHING ABOUT THE STORE
 * =============================================
 */

// $access_scopes = $shopify->rest_api('/admin/oauth/access_scopes.json', array(), 'GET');
// $response = json_decode($access_scopes['body'], true);


?>

<?php include_once("header.php"); ?>

<?php 

    /* $query = array("query" => "{
        shop {
            id
            name
            email
        }
    }");
    $graphql_test = $shopify->graphql($query);
    $graphql_test = json_decode($graphql_test['body'], true); */
    // echo print_r($graphql_test);

?>


    <section>
        <div class="alert columns twelve">
            <dl>
                <dt>
                    <p>Welcome to Elana Shopify</p>
                </dt>
            </dl>
        </div>
    </section>
    <footer></footer>




<?php include_once("footer.php"); ?>