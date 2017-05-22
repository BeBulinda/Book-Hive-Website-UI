
<?php
require_once WPATH . "modules/classes/Books.php";
require_once WPATH . "modules/classes/Users.php";
require_once WPATH . "modules/classes/System_Administration.php";
require_once WPATH . "modules/classes/Transactions.php";
$transactions = new Transactions();
$system_administration = new System_Administration();
$users = new Users();
$books = new Books();

if (isset($_SESSION["cart_number_of_items"]) AND $_SESSION["cart_number_of_items"] == 0) {
    ?>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>No items added to cart. <a href="?home"> Click here </a> to add items to your shopping cart before proceeding.</strong>
    </div>
    <?php
}

if (!empty($_POST) AND $_POST['action'] == "checkout_transaction") {
    if (isset($_SESSION["cart_item"])) {
        $_SESSION["transactedby"] = 01; // $_SESSION["user_id"];
        $_SESSION["payment_option"] = $_POST["payment_method"];
        $_SESSION["transaction_id"] = $transactions->getTransactionId($_SESSION["payment_option"], $_SESSION["transactedby"], $_SESSION["cart_total_cost"]);
        $transaction = $transactions->addTransaction();
        if (is_bool($transaction) && $transaction == true) {
            foreach ($_SESSION["cart_item"] as $item) {
                $_SESSION["book_id"] = $item["id"];
                $_SESSION["unit_price"] = $item["price"];
                $_SESSION["quantity"] = $item["quantity"];
                $transaction_details = $transactions->addTransactionDetails();
            }
            unset($_SESSION['cart_item']);
            $_SESSION["transaction_status"] = "success";
        } else {
            $_SESSION["transaction_status"] = "process_error";
        }
        App::redirectTo("?home");
    }
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<div id="mainBody">
    <div class="container">
        <div class="row">

            <div class="breadcrumb"> Shopping Cart <a id="btnEmpty" href="?checkout&action=empty">Empty Cart</a> <a href="?home" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a> </div>

            <?php
            if (isset($_SESSION["cart_item"])) {
                $item_total = 0;
                ?>	
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;"><strong>Product Name</strong></th>
                            <th style="text-align:left;"><strong>Unit Price</strong></th>
                            <th style="text-align:right;"><strong>Quantity</strong></th>
                            <th style="text-align:right;"><strong>Sub-Total Cost (KShs)</strong></th>
                            <th style="text-align:center;"><strong>Action</strong></th>
                        </tr>	
                        <?php
                        foreach ($_SESSION["cart_item"] as $item) {
                            $sub_item_total = ($item["price"] * $item["quantity"]);
                            ?>
                            <tr>
                                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["title"]; ?></strong></td>
                                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["price"]; ?></td>
                                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $sub_item_total; ?></td>
                                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="?checkout&action=remove&code=<?php echo $item["id"]; ?>" >Remove Item</a></td>
                            </tr>
                            <?php
                            $item_total += ($item["price"] * $item["quantity"]);
                        }
                        ?>

                        <tr>
                            <td colspan="5" align=right><strong>Total:</strong> <?php echo "KShs" . $item_total; ?></td>
                        </tr>
                    </tbody>
                    <?php
//                    unset($_SESSION["cart_item"]);
                    ?>
                </table>		
                <?php
            }

            if (!App::isLoggedIn()) {
                ?>

                <table class="table table-bordered">
                    <tr><th> I AM ALREADY REGISTERED  </th></tr>
                    <tr> 
                        <td>
                            <form class="form-horizontal" method="post">                    
                                <input type="hidden" name="action" value="login"/>
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign in</button> OR <a href="?register_individual_user" class="btn">Register Now</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <a href="#" style="text-decoration:underline">Forgot password ?</a>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>	

            <?php } ?>

            <form class="form-horizontal" method="post">                    
                <input type="hidden" name="action" value="checkout_transaction"/>
                <div class="control-group">
                    <label class="control-label" for="payment_method">Payment Method<sup>*</sup></label>
                    <div class="controls">
                        <select name="payment_method">
                            <?php echo $system_administration->getPaymentOptions(); ?>
                        </select>
                    </div>
                </div>

                <a href="?home" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
                <input class="btn btn-large pull-right" type="submit" value="Checkout" />
            </form>
        </div>
    </div>
</div>