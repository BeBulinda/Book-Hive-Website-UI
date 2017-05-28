<?php
//if (!App::isLoggedIn()) {
//    App::redirectTo("?");
//}
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
if (!empty($_POST)) {
    $_SESSION['company_name'] = $_POST['company_name'];
    $_SESSION['company_pin'] = $_POST['company_pin'];
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['postal_number'] = $_POST['postal_number'];
    $_SESSION['postal_code'] = $_POST['postal_code'];
    $_SESSION['town'] = $_POST['town'];
    $_SESSION['county'] = $_POST['county'];
    $_SESSION['sub_county'] = $_POST['sub_county'];
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['landmark_feature'] = $_POST['landmark_feature'];
    $_SESSION['user_type'] = 'BOOK SELLER';

    if (isset($_SESSION['company_name'])) {
        App::redirectTo("?add_system_administrator&ref_type=" . $_SESSION['user_type']);
    }
}

if (isset($_SESSION['added_book_seller']) && $_SESSION['added_book_seller'] == true) {
    ?>
    <div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Your registration was successful. Please check your email for login credentials.</strong> 
    </div>
    <?php
    unset($_SESSION['added_book_seller']);
} else if (isset($_SESSION['added_book_seller']) && $_SESSION['added_book_seller'] == false) {
    ?>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Your registration was unsuccessful. Please try again.</strong>
    </div>
    <?php
    unset($_SESSION['added_book_seller']);
}
?>

<?php require_once "core/template/header.php"; ?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="?home">Home</a> <span class="divider">/</span></li>
                <li class="active">Book Seller Registration</li>
            </ul>
            <h3> Book Seller Registration</h3>	
            <div class="well">
                <form class="form-horizontal" method="post">                    
                    <!--<input type="hidden" name="action" value="register_book_seller"/>-->
                    <div class="control-group">
                        <label class="control-label" for="company_name">Company name <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="company_name" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="company_pin">Company PIN</label>
                        <div class="controls">
                            <input type="text" name="company_pin" placeholder="Company PIN">
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
                    <div class="control-group">
                        <label class="control-label" for="postal_number">Postal Number <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="postal_number" id="postal_number" placeholder="Postal Number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="postal_code">Postal Code <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="town">Town <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="town" id="town" placeholder="Town">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="county">County<sup>*</sup></label>
                        <div class="controls">
                            <select name="county" id="county">
                                <<?php echo $system_administration->getCounties(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sub_county">Sub-County<sup>*</sup></label>
                        <div class="controls">
                            <select name="sub_county" id="sub_county">
                                <?php echo $system_administration->getSubCounties(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="location">Location<sup>*</sup></label>
                        <div class="controls">
                            <select name="location" id="location">
                                <?php echo $system_administration->getLocations(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="landmark_feature">Landmark Feature <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="landmark_feature" id="landmark_feature" placeholder="Landmark Feature">
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
