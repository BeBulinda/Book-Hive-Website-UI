
<?php
require_once WPATH . "modules/classes/Users.php";
require_once WPATH . "modules/classes/System_Administration.php";
//require_once WPATH . "modules/classes/Books.php";
//$books = new Books();
$system_administration = new System_Administration();
$users = new Users();
?>

<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="?product_summary"><img src="themes/images/ico-cart.png" alt="cart"><?php echo $_SESSION["cart_number_of_items"]; ?> Items in my cart  <span class="badge badge-warning pull-right"><?php echo "KShs. " . $_SESSION["cart_total_cost"]; ?></span></a></div>
    <br/>
    <div class="caption">
        <form class="form-inline navbar-search" method="post">
            <input type="hidden" name="action" value="filter_books"/>
            <strong>Filter By: </strong><br/><br/>
            <strong>Publisher </strong>
            <select class="srchTxt" name="publisher">
                <?php echo $users->getPublishers(); ?>
            </select><p>
                <strong>Book Level </strong>
                <select class="srchTxt" name="book_level">
                    <?php echo $system_administration->getBookLevels(); ?>
                </select><p>
                <strong>Book Type </strong>
                <select class="srchTxt" name="book_type">
                    <?php echo $system_administration->getBookTypes(); ?>
                </select><p>                   
                <button type="submit" id="submitButton" class="btn btn-primary">Filter</button>
        </form>
    </div><br/>
    <div class="thumbnail">
        <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
        <div class="caption">
            <center><h5>Publisher One's Advert</h5></center>
            <center><h5>Our Slogan, location, what we do..... etc</h5></center>
        </div>
    </div><br/>
    <div class="thumbnail">
        <img src="themes/images/products/kindle.jpg" title="Bootshop New Kindel" alt="Bootshop Kindel">
        <div class="caption">
            <center><h5>Book Seller One's Advert</h5></center>
            <center><h5>Our Slogan, location, what we do..... etc</h5></center>
        </div>
    </div><br/>
    <div class="thumbnail">
        <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
        <div class="caption">
            <center><h4>Publisher Two's Advert</h4></center>
            <center><h5>Our Slogan, location, what we do..... etc</h5></center>
        </div>
    </div><br/>
    <div class="thumbnail">
        <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>
<!-- Sidebar end=============================================== -->