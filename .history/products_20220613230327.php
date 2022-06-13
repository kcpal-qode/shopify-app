<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_id'])) {
        $delete = $shopify->rest_api('/admin/api/2022-04/products/' . $_POST['delete_id'] . '.json', array(), 'DELETE');
        $delete = json_decode($delete['body'], true);
    }
}

$products = $shopify->rest_api('/admin/api/2022-04/products.json', array(), 'GET');
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
                    $image = count($value['images']) > 0 ? $value['images'][0]['src'] : "";
            ?>
                    <tr>
                        <td><img src="<?php echo $image; ?>" width="35" height="35" alt=""></td>
                        <td>
                            <form action="" method="POST" class="row side-elements">
                                <input type="hidden" name="update_id" value="<?php echo $value['id']; ?>" />
                                <input type="text" name="update_name" value="<?php echo $value['title']; ?>" />
                                <button type="submit" class="secondary icon-checkmark"></button>

                            </form>
                            <?php //echo $value['title'] 
                            ?>
                        </td>
                        <td><?php echo $value['status'] ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="delete_id" value="<?php echo $value['id']; ?>" />
                                <button type="submit" class="secondary icon-trash"></button>
                        </td>
                        </form>
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