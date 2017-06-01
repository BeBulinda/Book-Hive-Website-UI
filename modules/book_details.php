
<?php
require_once WPATH . "modules/classes/Books.php";
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
$books = new Books();

$code = $_GET['code'];
$book_details = $books->fetchBookDetails($code);
$publisher_details = $users->fetchPublisherDetails($book_details['publisher']);

if ($book_details['level_id'] == 1) {
    $location = 'modules/images/books/ecd/';
} else if ($book_details['level_id'] == 2) {
    $location = 'modules/images/books/primary/';
} else if ($book_details['level_id'] == 3) {
    $location = 'modules/images/books/secondary/';
} else if ($book_details['level_id'] == 4) {
    $location = 'modules/images/books/adult/';
}

if (!empty($_POST) AND $_POST['action'] == "add") {
    $productByCode = $books->fetchBookDetails($_POST["code"]);
    $itemArray = array($productByCode["id"] => array('id' => $productByCode["id"], 'title' => $productByCode["title"], 'price' => $productByCode["price"], 'quantity' => $_POST["quantity"]));

    if (!empty($_SESSION["cart_item"])) {
        if (in_array($productByCode["id"], array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($productByCode["id"] == $k) {
                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                    }
                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                }
            }
        } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
    } else {
        $_SESSION["cart_item"] = $itemArray;
    }
}

require_once "core/template/header.php";
?>

<div id="mainBody">
    <div class="container">
        <div class="row">
            <?php include_once "modules/menus/main_sidebar.php"; ?>
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="?home">Home</a> <span class="divider">/</span></li>
                    <li class="active">Book Details</li>
                </ul>	
                <div class="row">	  
                    <div id="gallery" class="span3">
                        <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
                            <img src="<?php echo $location . $book_details['cover_photo']; ?>" style="width:80%" alt="<?php echo $book_details['title'] . " cover photo"; ?>"/>
                        </a>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <span class="btn"><i class="icon-envelope"></i></span>
                                <span class="btn" ><i class="icon-print"></i></span>
                                <span class="btn" ><i class="icon-zoom-in"></i></span>
                                <span class="btn" ><i class="icon-star"></i></span>
                                <span class="btn" ><i class=" icon-thumbs-up"></i></span>
                                <span class="btn" ><i class="icon-thumbs-down"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <h3><?php echo $book_details['title']; ?></h3>
                        <small>PUBLISHER - <?php echo $publisher_details['company_name']; ?></small>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm" method="post">
                            <input type="hidden" name="action" value="add"/>
                            <input type="hidden" name="code" value="<?php echo $code; ?>"/>
                            <div class="control-group">
                                <label class="control-label"><span> Price: <?php echo "KShs. " . $book_details['price']; ?></span></label>
                                <div class="controls">
                                    <input type="number" name="quantity" class="span1" placeholder="Qty."/>
                                    <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                                </div>
                            </div>
                        </form>

                        <hr class="soft"/>
                        <h4>Description</h4>
                        <hr class="soft clr"/>
                        <p>
                            <?php echo $book_details['description']; ?>
                        </p>
                        <br class="clr"/>
                        <a href="#" name="detail"></a>
                        <hr class="soft"/>
                    </div>
                    <a href="?home" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
                    <a href="?checkout" class="btn btn-large pull-right">Proceed to Checkout <i class="icon-arrow-right"></i></a>

                </div>
            </div>
        </div>
    </div>
</div>
