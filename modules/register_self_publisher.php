<?php
//if (!App::isLoggedIn()) {
//    App::redirectTo("?");
//}
require_once WPATH . "modules/classes/Users.php";
$users = new Users();

require_once "core/template/header.php"; 

if (!empty($_POST)) {
    $success = $users->execute();
    if (is_bool($success) && $success == true) {
        $_SESSION['add_success'] = true;
        ?>
        <div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Your registration was successful. Please check your email for login credentials.</strong> 
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-block alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Your registration was unsuccessful. Please try again.</strong>
        </div>
        <?php
    }
//    App::redirectTo("?home");
}
?>

<?php // require_once "core/template/header.php"; ?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="?home">Home</a> <span class="divider">/</span></li>
                <li class="active">Publisher Registration</li>
            </ul>
            <h3> Publisher Registration</h3>	
            <div class="well">
                <form class="form-horizontal" method="post">   
                    <input type="hidden" name="action" value="add_self_publisher"/> 
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
