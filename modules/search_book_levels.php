
<?php
require_once WPATH . "modules/classes/Books.php";
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
$books = new Books();
//
//argDump($_SESSION['searched_books']);
//argDump($_SESSION['searched_books']);
//exit();

if (isset($_SESSION["transaction_status"])) {
    if ($_SESSION["transaction_status"] == "success") {
        ?>
        <div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Your transaction was processed successfully. Kindly check your email for the invoice/receipt.</strong> 
        </div>
        <?php
    } else if ($_SESSION["transaction_status"] == "success") {
        ?>
        <div class="alert alert-block alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error processing your transaction. Please try again.</strong>
        </div>
        <?php
    }
    unset($_SESSION['transaction_status']);
}

if (!empty($_POST) AND $_POST['action'] == "add") {
    $productByCode = $books->fetchBookDetails($_POST["code"]);
    $itemArray = array($productByCode["id"] => array('id' => $productByCode["id"], 'title' => $productByCode["title"], 'price' => $productByCode["price"], 'quantity' => $_POST["quantity"]));

    if (!empty($_SESSION["cart_item"])) {
        if (in_array($productByCode["id"], array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
//
//                $id = $v['id'];
//                argDump($id);
//                argDump($id);
//                exit();

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
?>

<?php require_once "core/template/header.php"; ?>
<div id="mainBody">
    <div class="container">
        <div class="row">

            <div class="breadcrumb"><strong> ENGLISH BOOKS </strong></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Add Book</th>
                        <!--<th>Total Cost (KShs)</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['searched_books'])) {
                        $english_books_data[] = $_SESSION['searched_books'];
                    } else {
                        $english_books_data[] = $books->getAllTypeBooks("ENGLISH READER");
                    }
                    if (isset($_SESSION['no_english_records']) AND $_SESSION['no_english_records'] == true) {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align:left"><strong>No book found in this category...</strong></td>
                        </tr>
                        <?php
                        unset($_SESSION['no_english_records']);
                    } else if (isset($_SESSION['yes_english_records']) AND $_SESSION['yes_english_records'] == true) {
                        foreach ($english_books_data as $key => $value) {
                            $inner_array[$key] = json_decode($value, true); // this will give key val pair array
                            foreach ((array) $inner_array[$key] as $key2 => $value2) {
                                $publisher_details = $users->fetchPublisherDetails($value2['publisher']);

                                if ($value2['level_id'] == 1) {
                                    $location = 'modules/images/books/ecd/';
                                } else if ($value2['level_id'] == 2) {
                                    $location = 'modules/images/books/primary/';
                                } else if ($value2['level_id'] == 3) {
                                    $location = 'modules/images/books/secondary/';
                                } else if ($value2['level_id'] == 4) {
                                    $location = 'modules/images/books/adult/';
                                }
                                ?>
                                <tr>
                            <form method="post">
                                <input type="hidden" name="action" value="add"/>
                                <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                <td> <a href="?book_details&code=<?php echo $value2['id']; ?>"> <img width="50" src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/> <?php echo $value2['title']; ?> </a></td>
                                <td><?php echo $publisher_details['company_name']; ?></td>
                                <td><?php echo $value2['price']; ?></td>
                                <td>
                                    <div class="input-append"><input type="number" name="quantity" class="span1" style="max-width:34px" value="0" size="16"><button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i></button></div>
                                </td>
                                <td>
                                    <button type="submit" class="btn">Add To Cart</button>                                    
                                </td> 
                            </form>
                            </tr>
                            <?php
                        }
                    }
                    unset($_SESSION['yes_english_records']);
                }
                ?>
                </tbody>
            </table>

            <div class="breadcrumb"><strong> KISWAHILI BOOKS </strong></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Add Book</th>
                        <!--<th>Total Cost (KShs)</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['searched_books'])) {
                        $ecd_books_data[] = $_SESSION['searched_books'];
                    } else {
                        $kiswahili_books_data[] = $books->getAllTypeBooks("KISWAHILI READER");
                    }
                    if (isset($_SESSION['no_kiswahili_records']) AND $_SESSION['no_kiswahili_records'] == true) {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align:left"><strong>No book found in this category...</strong></td>
                        </tr>
                        <?php
                        unset($_SESSION['no_kiswahili_records']);
                    } else if (isset($_SESSION['yes_kiswahili_records']) AND $_SESSION['yes_kiswahili_records'] == true) {
                        foreach ($kiswahili_books_data as $key => $value) {
                            $inner_array[$key] = json_decode($value, true); // this will give key val pair array
                            foreach ((array) $inner_array[$key] as $key2 => $value2) {
                                $publisher_details = $users->fetchPublisherDetails($value2['publisher']);

                                if ($value2['level_id'] == 1) {
                                    $location = 'modules/images/books/ecd/';
                                } else if ($value2['level_id'] == 2) {
                                    $location = 'modules/images/books/primary/';
                                } else if ($value2['level_id'] == 3) {
                                    $location = 'modules/images/books/secondary/';
                                } else if ($value2['level_id'] == 4) {
                                    $location = 'modules/images/books/adult/';
                                }
                                ?>
                                <tr>
                            <form method="post">
                                <input type="hidden" name="action" value="add"/>
                                <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                <td> <a href="?book_details&code=<?php echo $value2['id']; ?>"> <img width="50" src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/> <?php echo $value2['title']; ?> </a></td>
                                <td><?php echo $publisher_details['company_name']; ?></td>
                                <td><?php echo $value2['price']; ?></td>
                                <td>
                                    <div class="input-append"><input type="number" name="quantity" class="span1" style="max-width:34px" value="0" size="16"><button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i></button></div>
                                </td>
                                <td>
                                    <button type="submit" class="btn">Add To Cart</button>                                    
                                </td> 
                            </form>
                            </tr>
                            <?php
                        }
                    }
                    unset($_SESSION['yes_kiswahili_records']);
                }
                ?>
                </tbody>
            </table>

            <div class="breadcrumb"><strong> POETRY BOOKS </strong></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Add Book</th>
                        <!--<th>Total Cost (KShs)</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['searched_books'])) {
                        $ecd_books_data[] = $_SESSION['searched_books'];
                    } else {
                        $poetry_books_data[] = $books->getAllTypeBooks("POETRY");
                    }
                    if (isset($_SESSION['no_poetry_records']) AND $_SESSION['no_poetry_records'] == true) {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align:left"><strong>No book found in this category...</strong></td>
                        </tr>
                        <?php
                        unset($_SESSION['no_poetry_records']);
                    } else if (isset($_SESSION['yes_poetry_records']) AND $_SESSION['yes_poetry_records'] == true) {
                        foreach ($poetry_books_data as $key => $value) {
                            $inner_array[$key] = json_decode($value, true); // this will give key val pair array
                            foreach ((array) $inner_array[$key] as $key2 => $value2) {
                                $publisher_details = $users->fetchPublisherDetails($value2['publisher']);

                                if ($value2['level_id'] == 1) {
                                    $location = 'modules/images/books/ecd/';
                                } else if ($value2['level_id'] == 2) {
                                    $location = 'modules/images/books/primary/';
                                } else if ($value2['level_id'] == 3) {
                                    $location = 'modules/images/books/secondary/';
                                } else if ($value2['level_id'] == 4) {
                                    $location = 'modules/images/books/adult/';
                                }
                                ?>
                                <tr>
                            <form method="post">
                                <input type="hidden" name="action" value="add"/>
                                <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                <td> <a href="?book_details&code=<?php echo $value2['id']; ?>"> <img width="50" src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/> <?php echo $value2['title']; ?> </a></td>
                                <td><?php echo $publisher_details['company_name']; ?></td>
                                <td><?php echo $value2['price']; ?></td>
                                <td>
                                    <div class="input-append"><input type="number" name="quantity" class="span1" style="max-width:34px" value="0" size="16"><button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i></button></div>
                                </td>
                                <td>
                                    <button type="submit" class="btn">Add To Cart</button>                                    
                                </td> 
                            </form>
                            </tr>
                            <?php
                        }
                    }
                    unset($_SESSION['yes_poetry_records']);
                }
                ?>
                </tbody>
            </table>

            <div class="breadcrumb"><strong> LIFESTYLE BOOKS </strong></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Add Book</th>
                        <!--<th>Total Cost (KShs)</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['searched_books'])) {
                        $ecd_books_data[] = $_SESSION['searched_books'];
                    } else {
                        $lifestyle_books_data[] = $books->getAllTypeBooks("LIFESTYLE");
                    }
                    if (isset($_SESSION['no_lifestyle_records']) AND $_SESSION['no_lifestyle_records'] == true) {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align:left"><strong>No book found in this category...</strong></td>
                        </tr>
                        <?php
                        unset($_SESSION['no_lifestyle_records']);
                    } else if (isset($_SESSION['yes_lifestyle_records']) AND $_SESSION['yes_lifestyle_records'] == true) {
                        foreach ($lifestyle_books_data as $key => $value) {
                            $inner_array[$key] = json_decode($value, true); // this will give key val pair array
                            foreach ((array) $inner_array[$key] as $key2 => $value2) {
                                $publisher_details = $users->fetchPublisherDetails($value2['publisher']);

                                if ($value2['level_id'] == 1) {
                                    $location = 'modules/images/books/ecd/';
                                } else if ($value2['level_id'] == 2) {
                                    $location = 'modules/images/books/primary/';
                                } else if ($value2['level_id'] == 3) {
                                    $location = 'modules/images/books/secondary/';
                                } else if ($value2['level_id'] == 4) {
                                    $location = 'modules/images/books/adult/';
                                }
                                ?>
                                <tr>
                            <form method="post">
                                <input type="hidden" name="action" value="add"/>
                                <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                <td> <a href="?book_details&code=<?php echo $value2['id']; ?>"> <img width="50" src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/> <?php echo $value2['title']; ?> </a></td>
                                <td><?php echo $publisher_details['company_name']; ?></td>
                                <td><?php echo $value2['price']; ?></td>
                                <td>
                                    <div class="input-append"><input type="number" name="quantity" class="span1" style="max-width:34px" value="0" size="16"><button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i></button></div>
                                </td>
                                <td>
                                    <button type="submit" class="btn">Add To Cart</button>                                    
                                </td> 
                            </form>
                            </tr>
                            <?php
                        }
                    }
                    unset($_SESSION['yes_lifestyle_records']);
                }
                ?>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="5" style="text-align:right"><strong>TOTAL (KShs) </strong></td>
                        <td class="label label-important" style="display:block"> <strong> <?php echo $_SESSION["cart_total_cost"]; ?> </strong></td>
                    </tr>
                </tbody>
            </table>

            <a href="?checkout" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
        </div>
    </div>
</div>