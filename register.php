<?php 
    $title = "Convo Portal | Register";
    include("core/init.php");
    logged_in_redirect();
    include("includes/overall/header.php");

    $errorId = "";

    $result = mysql_query("SELECT * FROM employee");

    if(isset($_POST["submit"])) {
        $ssn = sanitize($_POST["ssn_digits"]);
        $dob = sanitize($_POST["dob"]);
        
        if(empty($_POST["ssn_digits"]) || empty($_POST["dob"])) {
            $errorId = "Please enter your SSN and Date of Birth.";
        }
        else if(census_verify_exists($ssn, $dob) == false){
            $errorId = "Wrong SSN or date of birth.  Please try again.";
        }
        else if(empty($_POST["username"])){
            $errorId = "Please enter username";
        }
        else if(user_exists($_POST["username"]) === true) {
            $errorId = "Sorry, the username \"" . $_POST["username"] . "\" is already taken.";   
        }
        else if(preg_match("/\\s/", $_POST["username"]) == true) {
            $errorId = "Your username must not contain any spaces.";   
        }

        else if(strlen($_POST["password"]) < 6) {
            $errorId = "Your password must be at least 6 characters";
        }
        
         else if(strlen($_POST["password"]) > 30) {
            $errorId = "Your password is too long.  Please make the password between 6 and 30 characters.";
        }

        else if($_POST["password"] !== $_POST["password_again"]) {
             $errorId = "Your passwords do not match";   
        }
    }
?>
    <h1 class="headerPages">Employee Registration</h1>

<?php 
    if(isset($_GET["success"]) === true && empty($_GET["success"]) === false) {
        echo "You have been registered successfully!";   
    }
    else {
        if(empty($_POST) === false && empty($errorId) === true) {
           // register user
            $register_data = array(
                "username"      => $_POST["username"],
                "password"      => $_POST["password"],
            );
            
            $ssn = $_POST["ssn_digits"];
            $dob = $_POST["dob"];

            register_user($register_data, $ssn, $dob);
            // Redirect
            //header("Location: verify.php?success");
            echo "<p class='headerPages'>You have been registered successfully! Please login using the form at upper-right corner of the screen.</p>";
            // Exit
            exit();
        }
    }
?>
    <p>Please create your own username and password.</p>

    <form id="search_employee" method="POST" action="register.php">
        <span class="spanHeader">Enter your last four SSN digits: </span>
        <input type="password" name="ssn_digits" maxlength='4'><br/><br/>
        <span class="spanHeader">Enter your Date of Birth:</span>
        <input type="text" name="dob" class="datepicker" placeholder="MM-DD-YYYY"><br/><em class="note">MM-DD-YYYY</em><br/><br/>
        
        <span class="spanHeader">Username: </span>
        <input type="text" name="username"><br/>
        
        <span class="spanHeader">Password: </span>
        <input type="password" name="password">&nbsp;&nbsp;<em>The password must be between 6 and 30 characters.</em
        <br/><br/>
        
        <span class="spanHeader">Repeat Password: </span>
        <input type="password" name="password_again"><br/><br/>
        <input type="submit" class="btn-success" name="submit" value="Register"><br/><br/>
        
        <?php echo $errorId; ?>
    </form>

<?php
    include("includes/overall/footer.php"); 
?>