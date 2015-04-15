<?php 
    $title = "Convo Portal | Hire";
    include("core/init.php");
    admin_protect();
    include("includes/overall/header.php");
    include("includes/includes_functions.php");

    $errorId = $errorFirst = $errorLast = $errorPosition = $errorLocation = $errorStreet = $errorCity = $errorZip = $errorState = $errorDepartment = $errorStreetAddress = $errorCity = $errorZipCode = $errorPayroll = $errorDate = $errorLocation = $errorAdminPrivileges = $errorManagerPrivileges = $errorDOB = $errorSSN = $errorGender = "";

    $resultSupervisor = mysql_query("SELECT DISTINCT e.employeeID, CONCAT(s.lastname, ', ', s.firstname) AS supervisor FROM employee s INNER JOIN employee e ON e.employeeID = s.employeeID ORDER by s.lastname ASC");

    if(isset($_POST["submit"])) {
        if(empty($_POST["employeeID"])) {
            $errorId = "Please enter new employeeID";   
        }
        else if(!(is_numeric($_POST["employeeID"]))){
            $errorId = "Please enter numbers only";   
        }
        if(employee_id_exists($_POST["employeeID"]) == true) {
            $errorId = "The employeeID exists in the database, please enter different employeeID.";   
        }
        if(empty($_POST["firstname"])) {
            $errorFirst = "Please enter first name";
        }
        if(empty($_POST["lastname"])) {
            $errorLast = "Please enter last name";  
        }
        if(empty($_POST["change_position_name"])) {
            $errorPosition = "Please enter a position.";   
        }
        if(empty($_POST["convo_location"])) {
            $errorLocation = "Please enter a location";   
        }
        if(empty($_POST["res_state"])) {
            $errorState = "Please pick Resident State.";  
        }
        if(empty($_POST["department_name"])) {
            $errorDepartment = "Please select a department.";   
        }
        if(empty($_POST["street_address"])){
            $errorStreetAddress = "Please enter street address.";   
        }
        if(empty($_POST["city"])){
            $errorCity = "Please enter city.";   
        }
        if(empty($_POST["zipcode"])){
            $errorZipCode = "Please enter zip code.";   
        }
        else if(is_numeric($_POST["zipcode"]) == false){
            $errorZipCode = "Please enter in number only.";
        }
        if(empty($_POST["payroll_status"])) {
            $errorPayroll = "Please pick Payroll Status";  
        } 
        if(empty($_POST["hire_date"])) {
            $errorDate = "Please enter Month, Day, and Year";     
        }
        if(empty($_POST["admin_privileges"])){
            $errorAdminPrivileges = "Please select a privilege";   
        }
        if(empty($_POST["manager_privileges"])){
            $errorManagerPrivileges = "Please select a privilege";   
        }
        if(empty($_POST["dob"])){
            $errorDOB = "Please enter date of birth";   
        }
        if(empty($_POST["gender"])){
            $errorGender = "Please enter gender";   
        }
        if(empty($_POST["ssn"])){
            $errorSSN = "Please enter last 4 digits ssn";   
        }
        if($errorId == "" && $errorFirst == "" &&  $errorLast == "" && $errorPosition == "" && $errorLocation == "" && $errorState == "" && $errorDepartment == "" && $errorStreetAddress == "" && $errorCity == "" && $errorZipCode == "" && $errorPayroll == "" && $errorDate == "" && $errorAdminPrivileges == "" && $errorManagerPrivileges == "" && $errorDOB == "" && $errorGender == "" && $errorSSN == "") {
            $employeeID = sanitize($_POST["employeeID"]);
            $firstname = sanitize($_POST["firstname"]);
            $lastname = sanitize($_POST["lastname"]);
            $jobTitle = sanitize($_POST["change_position_name"]);
            $location = sanitize($_POST["convo_location"]);
            $state = sanitize($_POST["res_state"]);
            $department = sanitize($_POST["department_name"]);
            $street_address = sanitize($_POST["street_address"]);
            $city = sanitize($_POST["city"]);
            $zipcode = sanitize($_POST["zipcode"]);
            $payrollStatus = sanitize($_POST["payroll_status"]);
            // $supervisor = explode(" ", sanitize($_POST["supervisor"]))[0];
            $supervisor = sanitize($_POST["supervisor"]);
            $hire_date = sanitize($_POST["hire_date"]);
            $admin_privileges = sanitize($_POST["admin_privileges"]);
            $manager_privileges = sanitize($_POST["manager_privileges"]);
            $dob = sanitize($_POST["dob"]);
            $ssn = sanitize($_POST["ssn"]);
            $gender = sanitize($_POST["gender"]);
            
            if($admin_privileges == "Admin"){
                $admin_privileges = "1";   
            }
            else{
                $admin_privileges = "0";   
            }
            
            if($manager_privileges == "Manager"){
                $manager_privileges = "1";   
            }
            
            else{
                $manager_privileges = "0";
            }
            
           /*echo "employeeID: " . $employeeID;
            echo "FirstName: " . $firstname;
            echo "Last Name: " . $lastname;
            echo "Position: " . $jobTitle;
            echo "Location: " . $location;
            echo "State: " . $state;
            echo "Department: " . $department;
            echo "Street Address: " . $street_address;
            echo "City: " . $city;
            echo "zipcode: " . $zipcode;
            echo "Payroll: " . $payrollStatus;
            echo "Supervisor: " . $supervisor;
            echo "Hire Date: " . $hire_date;
            echo "Admin: " . $admin_privileges;
            echo "Manager: " . $manager_privileges;
            echo "Date of Birth: " . $dob;
            echo "SSN: " . $ssn;
            echo "Gender: " . $gender;*/
           
            mysql_query("INSERT INTO employee (employeeID, firstname, lastname, position_name, department_name, street_address, city, res_state, zipcode, convo_location, supervisorID, payroll_status, hire_date, review_date, termination_date, employment_status, manager_privileges, admin_privileges, active, password_recover, date_of_birth, ssn, gender) VALUES ('$employeeID', '$firstname', '$lastname', '$jobTitle', '$department', '$street_address', '$city', '$state', '$zipcode', '$location', '$supervisor', '$payrollStatus', '$hire_date', '1901-01-01', '1901-01-01', 'Active', '$manager_privileges', '$admin_privileges', '1', '0', '$dob', '$ssn', '$gender');");
            
            echo "<h2 class='headerPages'>You added new employee to database successfully!</h2>";
            die();      
        }
    }
?>

    <h1 class="headerPages">Add employee</h1>

    <div id="hireOrTerm">
        <!--<a class="hireOrTerm" href="hire.php">Add</a>-->
        <!--<a class="hireOrTerm" href="termination.php">Edit</a>-->
    </div>

    <h3>Please fill out the employee's information and they will be stored into the database.</h3>

    <form id="hire" method="POST">

        <!-- Personal Information -->
        <h2>Personal Information</h2>
        
        <!-- EmployeeID -->
        <span class="spanHeader">EmployeeID: </span>
        <input type="text" id="employeeID" name="employeeID" maxlength="4" placeholder="Employee ID" value=<?php if(isset($_POST["submit"])){echo $_POST['employeeID'];} ?>><?php echo $errorId; ?><br/><br/>

       <!-- First Name -->
        <span class="spanHeader">First Name: </span>
        <input type="text" id="firstname" name="firstname" size="10" placeholder="First Name" value=<?php if(isset($_POST["submit"])){echo $_POST['firstname'];} ?>><?php echo $errorFirst; ?><br/><br/>

        <!-- Last Name -->
        <span class="spanHeader">Last Name: </span>
        <input type="text" id="lastname" name="lastname" size="10" placeholder="Last Name" value=<?php if(isset($_POST["submit"])){echo $_POST['lastname'];} ?>><?php echo $errorLast; ?><br/><br/>

        <!-- Gender -->
        <span class="spanHeader">Gender: </span>
        <select name="gender">
            <option value="">Select a gender</option>
            <option value="M" <?php if(isset($_POST["submit"]) && $_POST["gender"] == "M"){echo "selected='selected'";} ?>>M</option>
            <option value="F" <?php if(isset($_POST["submit"]) && $_POST["gender"] == "F"){echo "selected='selected'";} ?> >F</option>
        </select> <?php echo $errorGender; ?><br/><br/>
            
        <!-- Date of Birth -->
        <span class="spanHeader">Date of Birth:</span>
        <input type="text" class="datepicker" placeholder="YYYY-MM-DD" name="dob" value=<?php if(isset($_POST["submit"])){echo $_POST['dob'];} ?>>
        <?php echo $errorDOB; ?><br/><br/>

        <!-- SSN -->
        <span class="spanHeader">SSN:</span>
        <input type="password" name="ssn" maxlength="4" size="5" placeholder="Enter last four digits">
        <?php echo $errorSSN; ?><br/><br/>

        <!-- Street Address-->
        <span class="spanHeader">Street Address: </span>
        <input type="text" id="street_address" class="input-xlarge" name="street_address" placeholder="Street Address" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['street_address'] . "'";} ?>><?php echo $errorStreetAddress; ?><br/><br/>

        <!-- City -->
        <span class="spanHeader">City: </span>
        <input type="text" id="city" name="city" placeholder="City" value=<?php if(isset($_POST["submit"])){echo "'" .  $_POST['city'] . "'"; } ?>><?php echo $errorCity; ?><br/><br/>

        <!-- Resident State -->
        <span class="spanHeader">Resident State: </span>
        <select name="res_state">
            <?= create_option_list($states, "state") ?>
        </select><?php echo $errorState; ?><br/><br/>

        <!-- Zip Code -->
        <span class="spanHeader">Zip Code: </span>
        <input type="text" id="zipcode" name="zipcode" placeholder="Zip Code" maxlength="5" value=<?php if(isset($_POST["submit"])){echo $_POST['zipcode'];} ?>><?php echo $errorZipCode; ?><br/><br/>

        
        <!-- EMPLOYEE INFORMATION -->
        <h2>Employee Information</h2>
        
        <!-- Position -->
        <span class="spanHeader">Position: </span>
            <?php
                echo "<select id='position_name' name='change_position_name'><option value=''>Select a Position</option>";
                while($row = mysql_fetch_assoc($resultPosition)) {
                    echo "<option value = '" . $row['position_name'] . "'";
                        
                    if(isset($_POST["submit"]) && $_POST["change_position_name"] == $row['position_name']){
                        echo "selected='selected'";
                    }       
                    echo ">" . $row['position_name'] . "</option>";   
                }
                echo "</select>";
                echo $errorPosition; 
            ?>
        <br/><br/>

        <!-- Convo Location -->
        <span class="spanHeader">Convo Location: </span>
            <?php
                echo "<select id='convo_location' name='convo_location'><option value=''>Select a Convo Location</option>";
                while($row = mysql_fetch_assoc($resultLocation)) {
                    echo "<option value = '" . $row['convo_location'] . "'";
                    if(isset($_POST["submit"]) && $_POST["convo_location"] == $row['convo_location']){
                        echo "selected='selected'";
                    }
                    echo ">" . $row['convo_location'] . "</option>";   
                }
                echo "</select>";
                echo $errorLocation; 
            ?>
        <br/><br/>

        <!-- Department -->
        <span class="spanHeader">Department: </span>
            <?php
                echo "<select id='department_name' name='department_name'><option value=''>Select a Department</option>";
                while($row = mysql_fetch_assoc($resultDepartment)) {
                    echo "<option value = '" . $row['department_name'] . "'";
                    if(isset($_POST["submit"]) && $_POST["department_name"] == $row['department_name']){
                        echo "selected='selected'";
                    }
                    echo ">" . $row['department_name'] . "</option>";   
                }
                echo "</select>";
                echo $errorDepartment; 
            ?>
        <br/><br/>

        <!-- Payroll Status -->
        <span class="spanHeader">Payroll Status: </span>
        <select id="payroll_status" name="payroll_status">
            <option value="">Select a Payroll Status</option>
            <option value="GBS" <?php if(isset($_POST["submit"]) && $_POST["payroll_status"] == "GBS"){echo "selected='selected'";} ?>>GBS</option>
            <option value="FT" <?php if(isset($_POST["submit"]) && $_POST["payroll_status"] == "FT"){echo "selected='selected'";} ?>>FT</option>
            <option value="PT" <?php if(isset($_POST["submit"]) && $_POST["payroll_status"] == "PT"){echo "selected='selected'";} ?>>PT</option>
        </select><?php echo $errorPayroll; ?><br/><br/>

        <!-- Supervisor -->
        <span class="spanHeader">Supervisor: </span>
            <?php   
                echo "<select id='supervisor' name='supervisor'>";
                echo "<option value=''>Select a supervisor</option>";
                while($row = mysql_fetch_assoc($resultSupervisor)) {
                echo "<option value ='" . $row['employeeID'] . "'";
                if(isset($_POST["submit"]) && $_POST["supervisor"] == $row['employeeID']){
                    echo "selected='selected'";
                }
                echo ">" . $row['supervisor'] . "</option>";   
            }
                echo "</select><br/> <em class='note'>blank means no supervisor</em>";
            ?><br/><br/>

        <!-- Hire Date -->
        <span class="spanHeader">Hire Date:</span>
        <input type="text" class="datepicker" placeholder="YYYY-MM-DD" name="hire_date" value=<?php if(isset($_POST["submit"])){echo $_POST['hire_date'];} ?>><?php echo $errorDate; ?><br/><br/>

        <!-- Admin Privileges -->
        <span class="spanHeader">Admin Privilege:</span>
        <select value="admin_privileges" name="admin_privileges">
            <option value="">Select a privillege</option>
            <option value = "Admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Admin"){echo "selected='selected'";} ?>>Admin</option>
            <option value = "Non_admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Non_admin"){echo "selected='selected'";} ?>>Non-Admin</option>
        </select><?php echo $errorAdminPrivileges; ?><br/><em class="note">Admin Privilege means to add or terminate employees.</em><br/>
               
        <!-- Manager Privileges -->
        <span class="spanHeader">Manager Privilege:</span>
        <select value="manager_privileges" name="manager_privileges">
            <option value="">Select a privillege</option>
            <option value = "Manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Manager"){echo "selected='selected'";} ?>>Manager</option>
            <option value = "Non_manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Non_manager"){echo "selected='selected'";} ?>>Non-Manager</option>
        </select><?php echo $errorManagerPrivileges; ?><br/><em class="note">Manager Privilege means to view the employee tables only.</em><br/>
        
        <input type="submit" id="addButton" name="submit" value="Add">
    </form>

<?php
    include("includes/overall/footer.php"); 
?>