<?php 
    error_reporting(0);
    $title = "Convo Portal | Add Database ";
    include("core/init.php");
    admin_protect();
    include("includes/overall/header.php");
    include("includes/includes_functions.php");

    $flagPosition = $flagLocation = $flagDepartment = 0;

    $errorJobCode = $errorDeptCode = $errorPosition = $errorDepartment = $errorLocationCode = $errorLocation = $errorAddress = $errorCity = $errorState = $errorZipCode = ""; 


    if(isset($_POST["submit"])){
        
        if(!(empty($_POST["position_name"])) || !(empty($_POST["job_code"]))){
            if(empty($_POST["job_code"])){
                $errorJobCode = "<span class='databaseErrors'>Please enter job code.</span>";
            }
            else if(job_code_exists($_POST["job_code"]) == true){
                $errorJobCode = "<span class='databaseErrors'>The job code exists in the database, please enter different code.</span>";
            }
            if(empty($_POST["position_name"])){
                $errorPosition = "<span class='databaseErrors'>Please enter position name.</span>";   
            }
            else if(position_name_exists($_POST["position_name"]) == true) {
                $errorPosition = "<span class='databaseErrors'>The position name exists in the database, please enter different name.</span>";   
            }
            if($errorPosition == "" && $errorJobCode == ""){
                $positionName = sanitize($_POST["position_name"]);
                $jobCode = sanitize($_POST["job_code"]);
                mysql_query("INSERT INTO position_type (position_name, job_code) VALUES ('$positionName', '$jobCode')");
                $flagPosition = 1; 
            }
        }
        
        if(!(empty($_POST["department_name"])) || !(empty($_POST["dept_code"]))){
            if(empty($_POST["dept_code"])){
                $errorDeptCode = "<span class='databaseErrors'>Please enter department code.</span>";
            }
            else if(department_code_exists($_POST["dept_code"]) == true){
                $errorDeptCode = "<span class='databaseErrors'>The department code exists in the database, please enter different code.</span>";
            }
            if(empty($_POST["department_name"])){
                $errorDepartment = "<span class='databaseErrors'>Please enter department name.</span>";
            }
            else if(department_name_exists($_POST["department_name"]) == true) {
                $errorDepartment = "<span class='databaseErrors'>The department name exists in the database, please enter different name.</span>";   
            }
            if($errorDepartment == "" && $errorDeptCode == ""){
                $departmentName = sanitize($_POST["department_name"]);
                $deptCode = sanitize($_POST["dept_code"]);
                mysql_query("INSERT INTO department (department_name, dept_code) VALUES ('$departmentName', '$deptCode')");  
                $flagDepartment = 1;
            }
        }
        
        if(!(empty($_POST["convo_location"])) || !(empty($_POST["address"])) || !(empty($_POST["city"])) || !(empty($_POST["res_state"])) || !(empty($_POST["zipCode"])) || !(empty($_POST["location_code"]))){
            if(empty($_POST["location_code"])){
                $errorLocationCode = "<span class='databaseErrors'>Please enter location code.</span>";
            }
            else if(convo_location_code_exists($_POST["location_code"]) == true){
                $errorLocationCode = "<span class='databaseErrors'>The location code exists in the database, please enter different code.</span>";
            }
            if(empty($_POST["convo_location"])){
                $errorLocation = "<span class='databaseErrors'>Please enter convo location.</span>";   
            }
            if(convo_location_exists($_POST["convo_location"]) == true) {
                $errorLocation = "<span class='databaseErrors'>The convo location exists in the database, please enter different location.</span>";   
            }
            if(empty($_POST["address"])){
                $errorAddress = "<span class='databaseErrors'>Please enter convo address</span>";   
            }
            if(empty($_POST["city"])){
                $errorCity = "<span class='databaseErrors'>Please enter city</span>";   
            }
            if(empty($_POST["res_state"])){
                $errorState = "<span class='databaseErrors'>Please select state</span>";   
            }
            if(empty($_POST["zipCode"])){
                $errorZipCode = "<span class='databaseErrors'>Please enter zip code</span>";   
            }
            else if(!(is_numeric($_POST["zipCode"]))){
                $errorZipCode = "<span class='databaseErrors'>Please enter numbers only.</span>";   
            }
            if($errorLocationCode == "" && $errorLocation == "" && $errorAddress == "" && $errorCity == "" && $errorState == "" && $errorZipCode == ""){
                $convoLocation = sanitize($_POST["convo_location"]);
                $address = sanitize($_POST["address"]);
                $city = sanitize($_POST["city"]);
                $state = sanitize($_POST["res_state"]);
                $zipCode = sanitize($_POST["zipCode"]);
                $locationCode = sanitize($_POST["location_code"]);
                
                mysql_query("INSERT INTO location (convo_location, address, city, state, zip_code, location_code) VALUES ('$convoLocation', '$address', '$city', '$state', '$zipCode', '$locationCode')");
                $flagLocation = 1;                
            }
        }
        
        if($flagPosition == 1 && $flagDepartment == 1 && $flagLocation == 1){
            echo "<h2 class='headerPages'>New position name, department name, and location were added to database successfully!</h2>";  
            die();
        }
        else if($flagPosition == 1 && $flagDepartment){
            echo "<h2 class='headerPages'>New position and department name were added to database successfully!</h2>";
            die();
        }
        else if($flagPosition == 1 && $flagLocation){
            echo "<h2 class='headerPages'>New position name and location were added to database successfully!</h2>"; 
            die();
        }
        else if($flagDepartment == 1 && $flagLocation == 1){
            echo "<h2 class='headerPages'>New department name and location were added to database successfully!</h2>"; 
            die();
        }
        else if($flagPosition == 1){
            echo "<h2 class='headerPages'>New position name was added to database successfully!</h2>"; 
            die();
        }
        else if($flagDepartment == 1){
            echo "<h2 class='headerPages'>New department name was added to database successfully!</h2>";  
            die();
        }
        else if($flagLocation == 1){
            echo "<h2 class='headerPages'>New location was added to database successfully!</h2>";   
            die();
        }
    }
?>
    <h1 class="headerPages">Add Database</h1>

    <form id="addDatabase" method="POST">
        
        <h2>Position</h2>
        
        <!-- Position -->
        <span class="spanHeader">Job Code: </span>
        <input type="text" id="job_code" name="job_code" placeholder="Job Code" value=<?php if(isset($_POST["submit"])){echo $_POST['job_code'];} ?>><?php echo $errorJobCode; ?><br/><br/>
        
        <span class="spanHeader">Position Name: </span>
        <input type="text" id="position_name" name="position_name" class="input-xlarge" placeholder="Employee Role" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['position_name'] . "'";} ?>><?php echo $errorPosition; ?><br/><br/>

        
        <!-- Department -->
        <h2>Department</h2>
        
        <span class="spanHeader">Department Code: </span>
        <input type="text" id="dept_code" name="dept_code" placeholder="Department Code" value=<?php if(isset($_POST["submit"])){echo $_POST['dept_code'];} ?>><?php echo $errorDeptCode; ?><br/><br/>
        
        <span class="spanHeader">Department Name: </span>
        <input type="text" id="department_name" name="department_name" class="input-xlarge" placeholder="Department Name" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['department_name'] . "'";} ?>><?php echo $errorDepartment; ?><br/><br/>

        
        <h2>Location</h2>
        <!-- Convo Location -->
        
        <span class="spanHeader">Location Code: </span>
        <input type="text" id="location_code" name="location_code" placeholder="Location Code" value=<?php if(isset($_POST["submit"])){echo $_POST['location_code'];} ?>><?php echo $errorLocationCode; ?><br/><br/>
        
        <span class="spanHeader">Convo Location: </span>
        <input type="text" id="convo_location" name="convo_location" class="input-xlarge" placeholder="Convo Location" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['convo_location'] . "'";} ?>><?php echo $errorLocation; ?><br/><br/>

        <!-- Address -->
        <span class="spanHeader">Address: </span>
        <input type="text" id="address" name="address" class="input-xlarge" placeholder="Address" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['address'] . "'";} ?>><?php echo $errorAddress; ?><br/><br/>

        <!-- City -->
        <span class="spanHeader">City: </span>
        <input type="text" id="city" name="city" placeholder="City" value=<?php if(isset($_POST["submit"])){echo "'" . $_POST['city'] . "'";} ?>><?php echo $errorCity; ?><br/><br/>
        
        <!-- State -->
        <span class="spanHeader">State: </span>
        <select name="res_state" class="input-medium">
            <?= create_option_list($states, "state") ?>
        </select><?php echo $errorState; ?><br/><br/>
        
        <!-- Zip Code -->
        <span class="spanHeader">Zip Code: </span>
        <input type="text" id="zipCode" name="zipCode" maxlength = "5" placeholder="Zip Code" value=<?php if(isset($_POST["submit"])){echo $_POST['zipCode'];} ?>><?php echo $errorZipCode; ?><br/><br/>
        
        <input type="submit" id="addButton" name="submit" value="Add">
    </form>

<?php
    include("includes/overall/footer.php"); 
?>