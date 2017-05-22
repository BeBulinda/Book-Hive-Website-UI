<?php
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
$ref_type = $_GET['ref_type'];  //If Publisher, Book seller etc

if (!empty($_POST)) {
    $_SESSION['admin_firstname'] = $_POST['firstname'];
    $_SESSION['admin_lastname'] = $_POST['lastname'];
    $_SESSION['admin_idnumber'] = $_POST['idnumber'];
    $_SESSION['admin_phone_number'] = $_POST['phone_number'];
    $_SESSION['admin_email'] = $_POST['email'];

//    if ($ref_type == "PUBLISHER") {
//        $success = $users->execute();
//        if (is_bool($success) && $success == true) {
//            $_SESSION['add_success'] = true;
//        }
//        App::redirectTo("?home");
//    } else 

    if ($ref_type == "BOOK SELLER") {
        $success = $users->execute();
        if (is_bool($success) && $success == true) {
            $_SESSION['added_book_seller'] = true;
        } else {
            $_SESSION['added_book_seller'] = false;
        }
        App::redirectTo("?register_book_seller");
    }
}
?>

<div id="mainBody">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="?home">Home</a> <span class="divider">/</span></li>
                <li class="active">Administrator Registration</li>
            </ul>
            <h3> Administrator Registration</h3>	
            <div class="well">
                <form class="form-horizontal" method="post">                    
                    <input type="hidden" name="action" value="register_book_seller"/>
                    <h5>Personal Information</h5>
                    <div class="control-group">
                        <label class="control-label" for="firstname">First name <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="firstname" id="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Last name <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="idnumber">ID/Passport Number <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="idnumber" id="idnumber" placeholder="ID/Passport Number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone_number">Phone Number <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
                        </div>
                    </div>	  
                    <div class="control-group">
                        <label class="control-label" for="email">Email <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="email" id="email" placeholder="Email Address">
                        </div>
                    </div>

                    <p><sup>*</sup>Required field	</p>

                    <div class="control-group">
                        <div class="controls">
                            <input class="btn btn-large btn-success" type="submit" value="Register" />
                        </div>
                    </div>		
                </form>
            </div>
        </div>
    </div>
</div>
