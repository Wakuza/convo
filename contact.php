<?php 
    $title = "Convo Portal";
    include("core/init.php");
    include("includes/overall/header.php");

?>

    <br/><br/><br/><br/>
    <div class="contact">
        <div class="container">
            <form class="well span8">
                <div class="row">
                    <div class="span3">
                        <label>First Name</label>
                        <input class="span3" placeholder= "Your First Name" type="text">
                        
                        <label>Last Name</label>
                        <input class="span3" placeholder="Your Last Name" type="text">
                        
                        <label>Email Address</label>
                        <input class="span3" placeholder="Your email address" type="text">
                        
                        <label>Subject</label>
                        <select class="span3" id="subject" name="subject">
                            <option selected value="na">Choose One:</option>
                            <option>Questions/Concerns</option>
                            <option>Suggestions</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="span5">
                        <label>Message</label>
                        <textarea class="input-xlarge span5" id="message" name="message" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary pull-right" type="submit">Send</button>
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
