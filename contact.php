<?php 
    $title = "Convo Portal";
    include("core/init.php");
    include("includes/overall/header.php");

$emailStatus = $errorMessage = $errorEmail = $errorFN = $errorLN = $errorSubject = "";
if(isset($_POST["submit"])){
    if(empty($_POST["firstname"])){
        $errorFN = "<span class='hireErrors'>Please enter your first name</span>";
        $counter = 1;
    }
    if(empty($_POST["lastname"])){
        $errorLN = "<span class='hireErrors'>Please enter your last name</span>"; 
        $counter = 1;
    }
    if(empty($_POST["email"])){
        $errorEmail = "<span class='hireErrors'> Please enter your email</span>";
        $counter = 1;
    }
    else if(!preg_match("/^([0-9a-zA-Z]+[-._+&amp;])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/", $_POST["email"])){
        $errorEmail = "<span class='hireErrors'>Please enter email. ex: example@gmail.com</span>";
        $counter = 1;
    }
    if(empty($_POST["message"])){
        $errorMessage = "<span class='hireErrors'>Please enter the message</span>";   
        $counter = 1;
    }
    
    if(empty($_POST["subject"])){
        $errorSubject = "<span class='hireErrors'>Please select a subject</span>";  
        $counter = 1;
    }

    // Send to the employees using automatic email saying Thank you and we will reply you soon as possible
    if($counter != 1){
        $to = $_POST["email"];
        $subject = "CONVO Portal - Automatic Response: " . $_POST["subject"];
        $message .= "Hello " . $_POST["firstname"] . ", \n\n";
        $message .= "Thank you for e-mailing CONVO Human Resources.  We will try to do our best to respond to your e-mail as soon as possible.  You can expect a response within two business days.\n\n";
        $message .= "Your message was sent to Human Resources:\n\n";
        $message .= "\"" . $_POST["message"] . "\"\n\n";
        $message .= "If you have any questions, please contact CONVO Human Resources at HR@convorelay.com.\n\n";
        $message .= "CONVO Human Resources\n";
        $message .= "Email:  HR@convorelay.com";
        $headers .= "From: CONVO Portal<pxy9548@rit.edu>\r\n";
        
        @mail($to, $subject, $message, $headers);
        //$emailStatus = "Mail sent"; 
        
        
        $to2 = 'pxy9548@rit.edu';
        $subject2 = 'Convo - ' . $_POST["subject"]; 
        $message2 .= "Hello HR,\n\n";
        $message2 .= $_POST["message"] . "\n\n";
        $message2 .= $_POST["firstname"] . " " . $_POST["lastname"];
        $headers2 .= "From: ". $_POST["firstname"] . " " . $_POST["lastname"] . "<" . $_POST["email"] . ">\r\n";
        //$headers2 .= "Cc: " . $_POST["email"] . "\r\n";
        @mail($to2, $subject2, $message2, $headers2);
        
        echo "<h2 class='headerPages'>Your mail was sent successfully.</h2>"; 
        die();
        
    }
}

?>

    <br/><br/><br/><br/>
    <div class="contact">
        <div class="container">
            <form class="well span8" method="POST">
                <div class="row">
                    <div class="span3">
                        <label>First Name</label><?php if(isset($_POST["submit"])){ echo $errorFN;} ?>
                        <input class="span3" name="firstname" placeholder= "Your First Name" type="text" value='<?php if(logged_in() == true && $user_data["firstname"] != NULL){echo $user_data['firstname'];}?>'>
                        
                        <label>Last Name</label><?php if(isset($_POST["submit"])){ echo $errorLN;} ?>
                        <input class="span3" name="lastname" placeholder="Your Last Name" type="text" value='<?php if(logged_in() == true && $user_data["lastname"] != NULL){echo $user_data['lastname'];}?>'>
                        
                        <label>Email Address</label><?php if(isset($_POST["submit"])){ echo $errorEmail;} ?>
                        <input class="span3" name="email" placeholder="Your email address" type="text" value='<?php if(logged_in() == true && $user_data["email"] != NULL){echo $user_data['email'];}?>'>
                        
                        <label>Subject</label><?php if(isset($_POST["submit"])){ echo $errorSubject;} ?>
                        <select class="span3" id="subject" name="subject">
                            <option value="">Choose One:</option>
                            <option value="login">Login</option>
                            <option value="Questions">Questions/Concerns</option>
                            <option value="suggestions">Suggestions</option>
                            <option value="none">Other</option>
                        </select>
                    </div>
                    <div class="span5">
                        <label>Message</label><?php if(isset($_POST["submit"])){ echo $errorMessage;} ?>
                        <textarea class="input-xlarge span5" id="message" name="message" rows="10"></textarea>
                    </div>
                    
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Send" />
                </div>
            </form>
        </div>  <!-- class Container ends -->
    </div>  <!-- Contact ends -->
    
    <div class="contact_info">
        <h2>Contact Us</h2>
        <hr/>
        <address>
            <strong>Convo HR</strong><br>
            <a href="mailto:HR@convorelay.com">HR@convorelay.com</a>
        </address>
    </div>
    

<?php
    include("includes/overall/footer.php"); 
?>
