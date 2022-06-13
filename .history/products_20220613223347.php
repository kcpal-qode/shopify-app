<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

$products = $shopify->rest_api('/admin/api/2022-04/products.json', array('limit' => 1), 'GET');
$products = json_decode($products['body'], true);

?>

<?php include_once("header.php"); ?>


<section>
    <table>
        <thead>
            <tr>
                <th colspan="2">Product</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($products as $product) {
                    foreach ($product as $key => $value) {
                        $image = count($value['images']) > 0 ? $value['images'][0]['src'] : "" ;
                        ?>
                            <tr>
                                <td><img src="<?php echo $image; ?>" width="35" height="35" alt=""></td>
                                <td><?php echo $value['title'] ?></td>
                                <td><?php echo $value['status'] ?></td>
                                <td><button class="secondary icon-trash"></button></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>
</section>
<footer></footer>




<?php include_once("footer.php"); ?>