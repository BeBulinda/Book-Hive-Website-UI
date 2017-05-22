<?php
require_once WPATH . "modules/classes/Transactions.php";
$transactions = new Transactions();
if (!empty($_POST)) {
    $success = $transactions->execute();
    if (is_bool($success) && $success == true) {
        //send email
//        $email = $_POST['email'];
//        $subject = 'WEBSITE INQUIRY: ' . strtoupper($_POST['subject']);
//        $message = $_POST['message'];
//        $receiver = "info@reflexconcepts.co.ke";
//        $mail = mail($receiver, "Subject: $subject", $message, "From: $email");
//        if ($mail) {
//            echo '<p class="link_to"> Message Sent. Getting back to you shortly.</p>';
//        } else {
//            echo '<p class="warning"> Error sending message. Please try again.</p>';
//        }

        $_SESSION['add_success'] = true;
        
        App::redirectTo("?register"); 
    }
}
?>
﻿
<div id="mainBody">
    <div class="container">
        <hr class="soften">
        <h1>Visit us</h1>
        <hr class="soften"/>	
        <div class="row">
            <div class="span4">
                <h4>Contact Details</h4>
                <p>
                    P.O. Box 25663-00100,<br/> Nairobi, Kenya
                    <br/><br/>
                    info@reflexconcepts.co.ke<br/>
                    ﻿Tel +254 710 534 013<br/>
                    Fax +254 710 534 013<br/>
                    web:www.reflexconcepts.co.ke
                </p>		
            </div>

            <div class="span4">
                <h4>Opening Hours</h4>
                <h5> Monday - Friday</h5>
                <p>09:00am - 09:00pm<br/><br/></p>
                <h5>Saturday</h5>
                <p>09:00am - 07:00pm<br/><br/></p>
                <h5>Sunday</h5>
                <p>12:30pm - 06:00pm<br/><br/></p>
            </div>
            <div class="span4">
                <h4>Email Us</h4>
                <form class="form-horizontal" method="post">                    
                    <input type="hidden" name="action" value="contact_us"/>
                    <fieldset>
                        <div class="control-group">
                            <input type="text" name="name" placeholder="name" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <input type="text" name="email" placeholder="email" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <input type="text" name="subject" placeholder="subject" class="input-xlarge"/>
                        </div>
                        <div class="control-group">
                            <textarea name="message" rows="3" id="textarea" class="input-xlarge"></textarea>
                        </div>
                        <input class="btn btn-large btn-success" type="submit" value="Send Message" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>