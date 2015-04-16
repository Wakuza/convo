<?php 
    $title = "Convo Portal";
    include("core/init.php");
    include("includes/overall/header.php");
?>

    <h1 class="headerPages">Contact</h1>
    <div class="contact">
        <div class="container">
            <form class="well span8">
                <div class="row">
                    <div class="span3">
                        <label>First Name</label> <input class="span3" placeholder=
                        "Your First Name" type="text"> <label>Last Name</label>
                        <input class="span3" placeholder="Your Last Name" type="text">
                        <label>Email Address</label> <input class="span3" placeholder=
                        "Your email address" type="text"> <label>Subject</label>
                        <select class="span3" id="subject" name="subject">
                            <option selected value="na">
                                Choose One:
                            </option>

                            <option value="service">
                                General Customer Service
                            </option>

                            <option value="suggestions">
                                Suggestions
                            </option>

                            <option value="product">
                                Product Support
                            </option>
                        </select>
                    </div>

                    <div class="span5">
                        <label>Message</label> 
                        <textarea class="input-xlarge span5" id="message" name="message"
                        rows="10">
            </textarea>
                    </div><button class="btn btn-primary pull-right" type=
                    "submit">Send</button>
                </div>
            </form>
        </div>
    </div>
    
<div class="contact_info">
            <address>
                <strong>Infini Consulting</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
</div>

<?php
    include("includes/overall/footer.php"); 
?>
