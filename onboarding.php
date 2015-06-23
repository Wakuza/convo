<?php 
    $title = "New Employee Onboarding";
    include("core/init.php");
    include("assets/inc/header.inc.php");
    include("includes/includes_functions.php");

    $errorFirst = $errorLast = $errorCity = $errorState = $errorStreetAddress = $errorZipCode = $errorDOB = $errorSSN = $errorEmail = $errorEmergencyName = $errorEmergencyNumber = "";


    if(isset($_POST["submit"])){
        if(empty($_POST["firstname"])) {
            $errorFirst = "<span class='error'>Please enter first name</span>";
        }
        if(empty($_POST["lastname"])) {
            $errorLast = "<span class='error'>Please enter last name</span>";  
        }
        if(empty($_POST["res_state"])) {
            $errorState = "<span class='error'>Please pick resident state</span>";  
        }
        if(empty($_POST["street_address"])){
            $errorStreetAddress = "<span class='error'>Please enter street address</span>";   
        }
        if(empty($_POST["city"])){
            $errorCity = "<span class='error'>Please enter city</span>";   
        }
        if(empty($_POST["zipcode"])){
            $errorZipCode = "<span class='error'>Please enter zip code</span>";   
        }
        else if(is_numeric($_POST["zipcode"]) == false){
            $errorZipCode = "<span class='error'>Please enter in number onl.</span>";
        }
        if(empty($_POST["dob"])){
            $errorDOB = "<span class='error'>Please enter date of birth</span>";     
        }
        if(empty($_POST["email"])) {
            $errorEmail = "<span class='error'> Please enter email address</span>"; 
        }
        if(empty($_POST["emergencyName"])) {
            $errorEmergencyName = "<span class='error'> Please enter contact's name</span>"; 
        }
        if(empty($_POST["emergencyNumber"])) {
            $errorEmergencyNumber = "<span class='error'> Please enter contact's phone number</span>"; 
        }
        if($errorFirst == "" &&  $errorLast == "" && $errorState == "" && $errorStreetAddress == "" && $errorCity == "" && $errorZipCode == "" && $errorDOB == "" && $errorSSN == "" && $errorEmail == "" && $errorEmergencyName == "" && $errorEmergencyNumber == "") {
            $firstname = sanitize($_POST["firstname"]);
            $lastname = sanitize($_POST["lastname"]);
            $state = sanitize($_POST["res_state"]);
            $street_address = sanitize($_POST["street_address"]);
            $city = sanitize($_POST["city"]);
            $zipcode = sanitize($_POST["zipcode"]);
            $dob = sanitize($_POST["dob"]);
            $ssn = sanitize($_POST["ssn"]);
            $email = sanitize($_POST["email"]);
            $emergencyName = sanitize($_POST["emergencyName"]);
            $emergencyNumber = sanitize($_POST["emergencyNumber"]);
            
            $dobInput = multiexplode(array("-", "/"), $dob);
            $date_of_birth = $dobInput[2] . "-" . $dobInput[0] . "-" . $dobInput[1];
            
            
            
            mysqli_query($link, "CALL insert_new_hire('$firstname', '$lastname', '$street_address', '$city', '$state', '$zipcode', '$date_of_birth', '$ssn', '$email', '$emergencyName', '$emergencyNumber', CURRENT_TIMESTAMP);");
            
            echo "CALL insert_expert_employee('$firstname', '$lastname', '$street_address', '$city', '$state', '$zipcode', '$date_of_birth', '$ssn', '$email', '$emergencyName', '$emergencyNumber', CURRENT_TIMESTAMP);";
            
            echo "<h2 class='headerPages'>We look forward to working with you!</h2>";
            die(); 
        }
    }
?>

<script>
    $("#primaryNav").hide();
    $("aside").hide();
    $("#convoLogo a").removeAttr("href");
</script>

<h2 class="headerPages">Welcome to Convo! Please fill out all the fields below.  Upon completion, you will receive an email with further instructions regarding your background check.</h2>

<form method="post">
    <h2>Personal Information</h2>

       <!-- First Name -->
        <span class="spanHeader">First Name: </span>
        <input type="text" id="firstname" name="firstname" size="10" placeholder="First Name" value=<?php if(isset($_POST["submit"])){echo $_POST['firstname'];} ?>>
        <?php echo $errorFirst; ?><br/><br/>

        <!-- Last Name -->
        <span class="spanHeader">Last Name: </span>
        <input type="text" id="lastname" name="lastname" size="10" placeholder="Last Name" value=<?php if(isset($_POST["submit"])){echo $_POST['lastname'];} ?>>
        <?php echo $errorLast; ?><br/><br/>

        <!-- Street Address-->
        <span class="spanHeader">Street Address: </span>
        <input type="text" id="street_address" class="input-xlarge" name="street_address" placeholder="Street Address" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['street_address'] . "'";} ?>>
        <?php echo $errorStreetAddress; ?><br/><br/>

        <!-- City -->
        <span class="spanHeader">City: </span>
        <input type="text" id="city" name="city" placeholder="City" value=<?php if(isset($_POST["submit"])){echo "'" .  $_POST['city'] . "'"; } ?>>
        <?php echo $errorCity; ?><br/><br/>

        <!-- Resident State -->
        <span class="spanHeader">Resident State: </span>
        <select name="res_state" class="input-medium">
            <?= create_option_list($states, "state") ?>
        </select>
        <?php echo $errorState; ?><br/><br/>

        <!-- Zip Code -->
        <span class="spanHeader">Zip Code: </span>
        <input type="text" id="zipcode" name="zipcode" placeholder="Zip Code" maxlength="9" value=<?php if(isset($_POST["submit"])){echo $_POST['zipcode'];} ?>>
        <?php echo $errorZipCode; ?><br/><br/>

        <!-- Date of Birth -->
        <span class="spanHeader">Date of Birth:</span>
        <input type="text" placeholder="MM/DD/YYYY" name="dob" value=<?php if(isset($_POST["submit"])){echo $_POST['dob'];} ?>>
        <?php echo $errorDOB; ?><br/><em class="note">MM/DD/YYYY</em><br/><br/>

        <!-- Email Address -->
        <span class="spanHeader">E-mail address:</span>
        <input type="text" name="email" value=<?php if(isset($_POST["submit"])){echo $_POST['email'];} ?>>
        <?php echo $errorEmail; ?><br/><br/>

        <h2>Emergency Contact Information</h2>
        <!-- Emergency Name -->
        <span class="spanHeader">Contact's Name:</span>
        <input type="text" name="emergencyName" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['emergencyName'] . "'";} ?>>
        <?php echo $errorEmergencyName; ?><br/><br/>

        <!-- Emergency Phone number -->
        <span class="spanHeader">Contact's Phone number:</span>
        <input type="text" name="emergencyNumber" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['emergencyNumber'] . "'";} ?>>
        <?php echo $errorEmergencyNumber; ?><br/><br/>



        <input type="submit" id="addButton" name="submit" value="Submit" />
</form>
<?php
    include("assets/inc/footer.inc.php"); 
?>