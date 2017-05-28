
<?php
require_once WPATH . "modules/classes/Books.php";
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
$books = new Books();

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

                $id = $v['id'];
                argDump($id);
                argDump($id);
                exit();

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
<?php include_once "core/template/banner.php"; ?>;
<div id="mainBody">
    <div class="container">
        <div class="row">
            <?php include_once "modules/menus/main_sidebar.php"; ?>
            <div class="span9">	

                <div class="breadcrumb"><strong> Featured Products </strong></div>

                <div class="well well-small">
                    <div class="row-fluid">
                        <div id="featured" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <ul class="thumbnails">
                                        <?php
                                        if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                                            $ecd_books_data[] = $books->execute();
                                        } else {
                                            $ecd_books_data[] = $books->getAllLevelBooks("ECD");
                                        }
                                        if (isset($_SESSION['no_ecd_records']) AND $_SESSION['no_ecd_records'] == true) {
                                            ?>
                                            <div style="text-align:left"><strong>No book found in this category...</strong></div>
                                            <?php
                                            unset($_SESSION['no_ecd_records']);
                                        } else if (isset($_SESSION['yes_ecd_records']) AND $_SESSION['yes_ecd_records'] == true) {
                                            foreach ($ecd_books_data as $key => $value) {
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

                                                    <form method="post">
                                                        <input type="hidden" name="action" value="add"/>
                                                        <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                                        <li class="span3">
                                                            <div class="thumbnail">
                                                                <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                                                <div class="caption">
            <!--                                                                    <center><?php // echo $value2['title'];  ?></center>
                                                                    <a class="btn" href="?book_details&code=<?php // echo $value2['id'];  ?>">VIEW</a> <span class="pull-right"><?php // echo "KShs. " . $value2['price'];  ?></span>-->
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                unset($_SESSION['yes_ecd_records']);
                                            }
                                            ?>
                                        </form>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <?php
                                        if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                                            $primary_books_data[] = $books->execute();
                                        } else {
                                            $primary_books_data[] = $books->getAllLevelBooks("PRIMARY LEVEL");
                                        }
                                        if (isset($_SESSION['no_primary_records']) AND $_SESSION['no_primary_records'] == true) {
                                            ?>
                                            <div style="text-align:left"><strong>No book found in this category...</strong></div>
                                            <?php
                                            unset($_SESSION['no_primary_records']);
                                        } else if (isset($_SESSION['yes_primary_records']) AND $_SESSION['yes_primary_records'] == true) {
                                            foreach ($primary_books_data as $key => $value) {
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
                                                    <form method="post">
                                                        <input type="hidden" name="action" value="add"/>
                                                        <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                                        <li class="span3">
                                                            <div class="thumbnail">
                                                                <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                                                <div class="caption">
            <!--                                                                    <center><?php // echo $value2['title'];  ?></center>
                                                                    <a class="btn" href="?book_details&code=<?php // echo $value2['id'];  ?>">VIEW</a> <span class="pull-right"><?php // echo "KShs. " . $value2['price'];  ?></span>-->
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                unset($_SESSION['yes_primary_records']);
                                            }
                                            ?>
                                        </form>
                                    </ul>

                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <?php
                                        if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                                            $secondary_books_data[] = $books->execute();
                                        } else {
                                            $secondary_books_data[] = $books->getAllLevelBooks("SECONDARY LEVEL");
                                        }
                                        if (isset($_SESSION['no_secondary_records']) AND $_SESSION['no_secondary_records'] == true) {
                                            ?>
                                            <div style="text-align:left"><strong>No book found in this category...</strong></div>
                                            <?php
                                            unset($_SESSION['no_secondary_records']);
                                        } else if (isset($_SESSION['yes_secondary_records']) AND $_SESSION['yes_secondary_records'] == true) {
                                            foreach ($secondary_books_data as $key => $value) {
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
                                                    <form method="post">
                                                        <input type="hidden" name="action" value="add"/>
                                                        <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                                        <li class="span3">
                                                            <div class="thumbnail">
                                                                <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                                                <div class="caption">
            <!--                                                                    <center><?php // echo $value2['title'];  ?></center>
                                                                    <a class="btn" href="?book_details&code=<?php // echo $value2['id'];  ?>">VIEW</a> <span class="pull-right"><?php // echo "KShs. " . $value2['price'];  ?></span>-->
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                unset($_SESSION['yes_secondary_records']);
                                            }
                                            ?>
                                        </form>

                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <?php
                                        if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                                            $adult_books_data[] = $books->execute();
                                        } else {
                                            $adult_books_data[] = $books->getAllLevelBooks("ADULT READER");
                                        }
                                        if (isset($_SESSION['no_adult_records']) AND $_SESSION['no_adult_records'] == true) {
                                            ?>
                                            <div style="text-align:left"><strong>No book found in this category...</strong></div>
                                            <?php
                                            unset($_SESSION['no_adult_records']);
                                        } else if (isset($_SESSION['yes_adult_records']) AND $_SESSION['yes_adult_records'] == true) {
                                            foreach ($adult_books_data as $key => $value) {
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
                                                    <form method="post">
                                                        <input type="hidden" name="action" value="add"/>
                                                        <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                                        <li class="span3">
                                                            <div class="thumbnail">
                                                                <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                                                <div class="caption">
            <!--                                                                    <center><?php // echo $value2['title'];  ?></center>
                                                                    <a class="btn" href="?book_details&code=<?php // echo $value2['id'];  ?>">VIEW</a> <span class="pull-right"><?php // echo "KShs. " . $value2['price'];  ?></span>-->
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                unset($_SESSION['yes_adult_records']);
                                            }
                                            ?>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb"><strong> ECD BOOKS </strong></div>
                <ul class="thumbnails" id="featured">
                    <?php
                    if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                        $ecd_books_data[] = $books->execute();
                    } else {
                        $ecd_books_data[] = $books->getAllLevelBooks("ECD");
                    }
                    if (isset($_SESSION['no_ecd_records']) AND $_SESSION['no_ecd_records'] == true) {
                        ?>
                        <div style="text-align:left"><strong>No book found in this category...</strong></div>
                        <?php
                        unset($_SESSION['no_ecd_records']);
                    } else if (isset($_SESSION['yes_ecd_records']) AND $_SESSION['yes_ecd_records'] == true) {
                        foreach ($ecd_books_data as $key => $value) {
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

                                <form method="post">
                                    <input type="hidden" name="action" value="add"/>
                                    <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                    <li class="span0">
                                        <div class="thumbnail">
                                            <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                            <div class="caption">
            <!--                                                <center><?php // echo $value2['title'];  ?></center>
                                                <h5 style="text-align:center"> <div class="btn" type="submit" >Add to <i class="icon-shopping-cart"></i></div> <a class="btn btn-primary"> <?php // echo "KShs. " . $value2['price'];  ?></a></h5>-->
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                }
                            }
                        unset($_SESSION['yes_ecd_records']);
                        }
                        ?>
                    </form>
                </ul>

                <br />

                <div class="breadcrumb"><strong> PRIMARY BOOKS </strong></div>
                <ul class="thumbnails" id="featured">
                    <?php
                    if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                        $primary_books_data[] = $books->execute();
                    } else {
                        $primary_books_data[] = $books->getAllLevelBooks("PRIMARY LEVEL");
                    }
                    if (isset($_SESSION['no_primary_records']) AND $_SESSION['no_primary_records'] == true) {
                        ?>
                        <div style="text-align:left"><strong>No book found in this category...</strong></div>
                        <?php
                        unset($_SESSION['no_primary_records']);
                    } else if (isset($_SESSION['yes_primary_records']) AND $_SESSION['yes_primary_records'] == true) {
                        foreach ($primary_books_data as $key => $value) {
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
                                <form method="post">
                                    <input type="hidden" name="action" value="add"/>
                                    <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                    <li class="span0">
                                        <div class="thumbnail">
                                            <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                            <div class="caption">
            <!--                                                <center><?php // echo $value2['title'];  ?></center>
                                                <h5 style="text-align:center"> <div class="btn" type="submit" >Add to <i class="icon-shopping-cart"></i></div> <a class="btn btn-primary"> <?php // echo "KShs. " . $value2['price'];  ?></a></h5>-->
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            unset($_SESSION['yes_primary_records']);
                        }
                        ?>
                    </form>
                </ul>

                <br />

                <div class="breadcrumb"><strong> SECONDARY BOOKS </strong></div>
                <ul class="thumbnails" id="featured">
                    <?php
                    if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                        $secondary_books_data[] = $books->execute();
                    } else {
                        $secondary_books_data[] = $books->getAllLevelBooks("SECONDARY LEVEL");
                    }
                    if (isset($_SESSION['no_secondary_records']) AND $_SESSION['no_secondary_records'] == true) {
                        ?>
                        <div style="text-align:left"><strong>No book found in this category...</strong></div>
                        <?php
                        unset($_SESSION['no_secondary_records']);
                    } else if (isset($_SESSION['yes_secondary_records']) AND $_SESSION['yes_secondary_records'] == true) {
                        foreach ($secondary_books_data as $key => $value) {
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
                                <form method="post">
                                    <input type="hidden" name="action" value="add"/>
                                    <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                    <li class="span0">
                                        <div class="thumbnail">
                                            <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                            <div class="caption">
            <!--                                                <center><?php // echo $value2['title'];  ?></center>
                                                <h5 style="text-align:center"> <div class="btn" type="submit" >Add to <i class="icon-shopping-cart"></i></div> <a class="btn btn-primary"> <?php // echo "KShs. " . $value2['price'];  ?></a></h5>-->
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            unset($_SESSION['yes_secondary_records']);
                        }
                        ?>
                    </form>
                </ul>

                <br />

                <div class="breadcrumb"><strong> LIFESTYLE BOOKS </strong></div>
                <ul class="thumbnails" id="featured">
                    <?php
                    if (!empty($_POST) AND $_POST['action'] == "filter_books") {
                        $adult_books_data[] = $books->execute();
                    } else {
                        $adult_books_data[] = $books->getAllLevelBooks("ADULT READER");
                    }
                    if (isset($_SESSION['no_adult_records']) AND $_SESSION['no_adult_records'] == true) {
                        ?>
                        <div style="text-align:left"><strong>No book found in this category...</strong></div>
                        <?php
                        unset($_SESSION['no_adult_records']);
                    } else if (isset($_SESSION['yes_adult_records']) AND $_SESSION['yes_adult_records'] == true) {
                        foreach ($adult_books_data as $key => $value) {
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
                                <form method="post">
                                    <input type="hidden" name="action" value="add"/>
                                    <input type="hidden" name="code" value="<?php echo $value2['id']; ?>"/>

                                    <li class="span0">
                                        <div class="thumbnail">
                                            <a  href="?book_details&code=<?php echo $value2['id']; ?>"><img src="<?php echo $location . $value2['cover_photo']; ?>" alt=""/></a>
                                            <div class="caption">
            <!--                                                <center><?php // echo $value2['title'];  ?></center>
                                                <h5 style="text-align:center"> <div class="btn" type="submit" >Add to <i class="icon-shopping-cart"></i></div> <a class="btn btn-primary"> <?php // echo "KShs. " . $value2['price'];  ?></a></h5>-->
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            unset($_SESSION['yes_adult_records']);
                        }
                        ?>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>
