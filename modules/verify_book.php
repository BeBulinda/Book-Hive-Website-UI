<?php

require_once WPATH . "modules/classes/Transactions.php";
$transactions = new Transactions();
if (!empty($_POST)) {
        $success = $transactions->execute();
        if (is_bool($success) && $success == true) {
            $_SESSION['add_success'] = true;
        }
}
?>
﻿
<?php require_once "core/template/header.php"; ?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="?home">Home</a> <span class="divider">/</span></li>
                <li class="active">Verify Book</li>
            </ul>
            <h3> Verify Book</h3>	
            <div class="well">
                <form class="form-horizontal" method="post">
                    <input type="hidden" name="action" value="verify_book"/>
                    <input type="hidden" name="createdby" value="<?php echo 01; //  echo $_SESSION['userid'];        ?>"/>
                    <h5>Kindly fill in the below details:</h5>
                    <div class="control-group">
                        <label class="control-label" for="number">Book ISBN Number <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="number" placeholder="ISBN Number">
                        </div>
                    </div>
                    
                    <p><sup>*</sup>Required field	</p>

                    <div class="control-group">
                        <div class="controls">
                            <input class="btn btn-large btn-success" type="submit" value="Verify" />
                        </div>
                    </div>		
                </form>
            </div>
        </div>
    </div>
</div>
