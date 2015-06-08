<?php 
    $title = "Convo Portal | Register";
    include("core/init.php");
    //admin_protect();
    logged_in_redirect();
    include("includes/overall/header.php");

    $errorId = "";

    $result = mysql_query("SELECT * FROM employee");

    if(isset($_POST["submit"])) {
        $ssn = sanitize($_POST["ssn_digits"]);
        $dob = sanitize($_POST["dob"]);
        if(empty($_POST["ssn_digits"]) || empty($_POST["dob"])) {
            $errorId = "<span class='registerErrors'>Please enter your SSN and Date of Birth.</span>";
        }
        else if(census_verify_exists($ssn, $dob) == false){
            $errorId = "<span class='registerErrors'>Wrong SSN or date of birth.  Please try again.</span>";
        }
        else if(empty($_POST["username"])){
            $errorId = "<span class='registerErrors'>Please enter username</span>";
        }
        else if(user_exists($_POST["username"]) === true) {
            $errorId = "<span class='registerErrors'>Sorry, the username \"" . $_POST["username"] . "\" is already taken.</span>";   
        }
        else if(preg_match("/\\s/", $_POST["username"]) == true) {
           // $regular_expression = preg_match("/\\s/", $_POST["username"]);
           // var_dump($regular_expression);
            $errorId = "<span class='registerErrors'>Your username must not contain any spaces.</span>";   
        }

        else if(strlen($_POST["password"]) < 6) {
            $errorId = "<span class='registerErrors'>Your password must be at least 6 characters</span>";
        }

        else if($_POST["password"] !== $_POST["password_again"]) {
             $errorId = "<span class='registerErrors'>Your passwords do not match</span>";   
        }
    }
?>

    <h1 class="headerPages">Employee Registration</h1>

<?php 
    if(isset($_GET["success"]) === true && empty($_GET["success"]) === false) {
        echo "You have been registered successfully! Please check your email to activate your account.";   
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
        <input type="password" name="ssn_digits" size='5' maxlength="4"><br/><br/>
        <span class="spanHeader">Enter your Date of Birth:</span>
        <input type="text" name="dob" class="datepicker" placeholder="MM-DD-YYYY"><br/>
        <em class="note">MM-DD-YYYY</em><br/><br/>
        
        
        <span class="spanHeader">Username: </span>
        <input type="text" name="username"><br/><br/>
        
        <span class="spanHeader">Password: </span>
        <input type="password" name="password">
        &nbsp;&nbsp;<em>The password must be between 6 and 30 characters.</em><br/><br/>
        
        <span class="spanHeader">Repeat Password: </span>
        <input type="password" name="password_again"><br/><br/>
        <input type="submit" class="btn-success" name="submit" value="Register"><br/><br/>
        
        <?php echo $errorId; ?>
    </form>

<?php
include("includes/overall/footer.php"); 

?>