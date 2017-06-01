<?php
require_once WPATH . "modules/classes/Users.php";
require_once WPATH . "modules/classes/System_Administration.php";
require_once WPATH . "modules/classes/Books.php";
$books = new Books();
$system_administration = new System_Administration();
$users = new Users();

//unset($_SESSION['searched_books']);
$item_total = 0;

if (isset($_SESSION["cart_item"])) {
    $_SESSION["cart_number_of_items"] = count($_SESSION["cart_item"]);
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);
        $_SESSION["cart_total_cost"] = $item_total;
    }
} else {
    $_SESSION["cart_number_of_items"] = 0;
    $_SESSION["cart_total_cost"] = 0;
}

if (!empty($_POST)) {
    if ($_POST['action'] == "register_usertype") {
        if ($_POST['user_type'] === "individual_user") {
            App::redirectTo("?register_individual_user");
        } else if ($_POST['user_type'] === "book_seller") {
            App::redirectTo("?register_book_seller");
        } else if ($_POST['user_type'] === "self_publisher") {
            App::redirectTo("?register_self_publisher");
        }
    } else if ($_POST['action'] == "search") {
        $searched_books[] = $books->getAllSearchedBooks($_POST['search_by'], $_POST['search_value']);
        $_SESSION['searched_books'] = $searched_books;
        if ($_POST['search_by'] === "none") {
             App::redirectTo("?home2");
        } else if ($_POST['search_by'] === "all") {
             App::redirectTo("?search_all_books");
        } else if ($_POST['search_by'] === "publishers") {
             App::redirectTo("?search_all_books");
        } else if ($_POST['search_by'] === "book_titles") {
             App::redirectTo("?search_individual_books");
        } else if ($_POST['search_by'] === "publication_years") {
             App::redirectTo("?search_individual_books");
        } else if ($_POST['search_by'] === "isbn_numbers") {
             App::redirectTo("?search_individual_books");
        } else if ($_POST['search_by'] === "book_types") {
             App::redirectTo("?search_all_books");
        } else if ($_POST['search_by'] === "book_levels") {
            App::redirectTo("?search_book_levels");
        }
    } else if ($_POST['action'] == "login") {
        $success = $users->execute();
        if (is_bool($success) && $success == true) {
            $user_details = $users->fetchLoggedInUserDetails($_SESSION['userid']);
            if ($user_details['status'] == 1) {
                $_SESSION['account_blocked'] = true;
            }
            if ($user_details['password_new'] == 0) {
                App::redirectTo("?update_password");
            }
            App::redirectTo("?home");
        }
    }
}
?>

<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
<!--            <div class="span6">Welcome<strong> Maurice</strong></div>-->
            <div class="span12">
                <div class="pull-right">
                    <a href="?product_summary"><span class="btn btn-mini btn-primary" title="Check my Cart"><i class="icon-shopping-cart icon-white"></i> [ <?php echo $_SESSION["cart_number_of_items"]; ?> ] Items in my cart </span> </a>
                    <span class="btn btn-mini" title="Total Cash Payable"> <?php echo "KShs. " . $_SESSION["cart_total_cost"]; ?> </span>		 
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="?home"><img src="themes/images/bookhive_logo.svg" width="100" alt="Bookhive"/></a>

                <form class="form-inline navbar-search" method="post">
                    <input type="hidden" name="action" value="search"/>
                    <input id="srchFld" name="search_value" class="srchTxt" type="text" width="160" />
<!--                    <select name="search_by" class="srchTxt">
                        <option value="none">Filter By:</option>
                        <option value="all">All</option>
                        <option value="publishers">Publishers </option>
                        <option value="book_titles">Book Titles </option>
                        <option value="publication_years">Publication Years </option>
                        <option value="isbn_numbers">ISBN Numbers </option>
                        <option value="book_types">Book Types </option>
                        <option value="book_levels">Book Levels</option>
                    </select> -->

                    <!--<button type="submit" id="submitButton" class="btn btn-primary">Go</button>-->
                </form>

                <!--                <form class="form-inline navbar-search" method="post">
                                    <input type="hidden" name="action" value="filter_books"/>
                                    <select class="srchTxt" name="publisher">
                <?php // echo $users->getPublishers(); ?>
                                    </select>
                                    <select class="srchTxt" name="book_level">
                <?php // echo $system_administration->getBookLevels(); ?>
                                    </select>                    
                                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                                </form>-->
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="?publisher_books&publisher=2">Publishers</a></li>
                    <li class=""><a href="?verify_book">Verify Book</a></li>
                    <li class=""><a href="?report_piracy">Report Piracy</a></li>
                    <li class="">
                        <a href="#register" data-toggle="modal" style="padding-right:0">Register</a>
                        <div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="false" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Register</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm" method="post">                    
                                    <input type="hidden" name="action" value="register_usertype"/>
                                    <div class="control-group">
                                        <label class="control-label" for="user_type">Select User Type:</label>
                                        <div class="controls">
                                            <select name="user_type">
                                                <option value="individual_user">Individual User</option>
                                                <option value="book_seller">Book Seller</option>
                                                <option value="self_publisher">Self Publisher</option>
                                            </select>
                                        </div>
                                    </div>		
                                    <button type="submit" class="btn btn-success">Next</button>
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>                                    
                                </form>
                            </div>
                        </div>
                    </li>

                    <li class=""><a href="?contact_us">Contact Us</a></li>

                    <?php if (!App::isLoggedIn()) { ?>

                        <li class="">
                            <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                            <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3>Login</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal loginFrm" method="post">                    
                                        <input type="hidden" name="action" value="login"/>                                    
                                        <div class="control-group">
                                            <label class="control-label" for="username">Username/Email:</label>
                                            <div class="controls">
                                                <input type="text" name="username" placeholder="Username/Email">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="password">Password:</label>
                                            <div class="controls">
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="checkbox">
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>		
                                        <button type="submit" class="btn btn-success" data-dismiss="modal">Sign in</button>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="">
                            <a href="?logout" role="button" style="padding-right:0"><span class="btn btn-large btn-danger">Logout</span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header End====================================================================== -->