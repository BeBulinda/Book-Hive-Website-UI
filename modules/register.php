<?php
//if (!App::isLoggedIn()) {
//    App::redirectTo("?");
//}
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
if (!empty($_POST)) {
    $_SESSION['individual_firstname'] = $_POST['firstname'];
    $_SESSION['individual_lastname'] = $_POST['lastname'];
    $_SESSION['individual_gender'] = $_POST['gender'];
    $_SESSION['individual_idnumber'] = $_POST['idnumber'];
    $_SESSION['user_type'] = 'INDIVIDUAL USER';

    if (isset($_SESSION['individual_firstname'])) {
        App::redirectTo("?add_contact&ref_type=" . $_SESSION['user_type']);
    }
}
?>

<?php require_once "core/template/header.php"; ?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <?php include_once "modules/menus/main_sidebar.php"; ?>
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="?home">Home</a> <span class="divider">/</span></li>
                    <li class="active">User Registration</li>
                </ul>
                <h3> User Registration</h3>	
                <div class="well">
                    <form class="form-horizontal" method="post">                    
                                    <input type="hidden" name="action" value="register_usertype"/>
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
                            <label class="control-label" for="gender">Gender<sup>*</sup></label>
                            <div class="controls">
                                <select name="gender" id="gender">
                                    <option value="1">Male</option>
                                    <option value="1">Female</option>
                                </select>
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
</div>
