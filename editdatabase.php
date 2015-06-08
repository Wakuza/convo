<?php 
    error_reporting(0);
    $title = "Convo Portal | Edit Database";
    include("core/init.php");
    admin_protect();
    include("includes/overall/header.php");
    include("includes/includes_functions.php");
    //$url_empID = $_GET["employerID"];

$flagPosition = $flagLocation = $flagDepartment = 0;

    $errorName = $errorPosition = $errorDepartment = $errorEmpStatus = $errorPayroll = $errorLocation = $errorTerm = "";
    $resultemployee = mysql_query("SELECT * FROM employee ORDER by lastname, firstname ASC");
    if(isset($_POST["submit"])) {       
        if(!(empty($_POST["positionName"]))){
            $jobCode = sanitize($_POST["job_code"]);
            $jobTitle = sanitize($_POST["change_positionName"]);
            mysql_query("UPDATE position_type SET position_name = '$jobTitle' WHERE job_code = '$jobCode'");  
            $flagPosition = 1;
        }
        if(!(empty($_POST["departmentName"]))){
            $deptCode = sanitize($_POST["dept_code"]);
            $department = sanitize($_POST["change_department_name"]);
            mysql_query("UPDATE department SET department_name = '$department' WHERE dept_code = '$deptCode'"); 
            $flagDepartment = 1;
        }
        
        if(!(empty($_POST["convoLocation"]))){
            $locationCode = sanitize($_POST["location_code"]);
            $location = sanitize($_POST["change_convoLocation"]);
            $address = sanitize($_POST["address"]);
            $city = sanitize($_POST["city"]);
            $state = sanitize($_POST["state"]);
            $zipcode = sanitize($_POST["zipCode"]);
            
            mysql_query("UPDATE location SET convo_location = '$location', address = '$address', city = '$city', state = '$state', zip_code = '$zipcode' WHERE location_code = '$locationCode'"); 
            
            $flagLocation = 1;
        }
        
        if($flagPosition == 1 && $flagDepartment == 1 && $flagLocation == 1){
            echo "<h2 class='headerPages'>Position name, department name, and location were updated to database successfully!</h2>";  
            die();
        }
        else if($flagPosition == 1 && $flagDepartment){
            echo "<h2 class='headerPages'>Position and department name were updated to database successfully!</h2>";
            die();
        }
        else if($flagPosition == 1 && $flagLocation){
            echo "<h2 class='headerPages'>Position name and location were updated to database successfully!</h2>"; 
            die();
        }
        else if($flagDepartment == 1 && $flagLocation == 1){
            echo "<h2 class='headerPages'>Department name and location were updated to database successfully!</h2>"; 
            die();
        }
        else if($flagPosition == 1){
            echo "<h2 class='headerPages'>Position name was updated to database successfully!</h2>"; 
            die();
        }
        else if($flagDepartment == 1){
            echo "<h2 class='headerPages'>Department name was updated to database successfully!</h2>";  
            die();
        }
        else if($flagLocation == 1){
            echo "<h2 class='headerPages'>Location was updated to database successfully!</h2>";   
            die();
        }
        
        
        
        //echo "UPDATE department SET department = '$department' WHERE dept_code = '$deptCode'";
    }
?>
    <h1 class="headerPages">Edit Database</h1>

        <h2>Position</h2>

    <form id="changes" action="editdatabase.php" method="POST">
        <span class="spanHeader">Position Name: </span>
        <?php
            echo "<select id='positionName' name='positionName'><option value=''>Select a position name</option>";
            while($row = mysql_fetch_assoc($resultPosition)) {
                echo "<option value = '" . $row["position_name"] . "|" . $row["job_code"] . "'>" . $row["position_name"] . "</option>";   
            }
            echo "</select>";?>
        <input type='hidden' name='job_code' class="input-xlarge" style='background:#E9E9E9;' readonly>
        <br/><br/>

        <span class="spanHeader">Position Name Change: </span>
        <input type='text' name='change_positionName' class="input-xlarge">        
        <input type='text' name='current_positionName' class="input-xlarge" style='background:#E9E9E9;' readonly>
        <br/><br/><br/>
        
        <h2>Department</h2>

        <span class="spanHeader">Department: </span>
            <?php
                echo "<select id='departmentName' name='departmentName'><option value=''>Select a Department</option>";
                while($row = mysql_fetch_assoc($resultDepartment)) {
                    echo "<option value = '" . $row['department_name'] . "|" . $row["dept_code"] . "'>" . $row['department_name'] . "</option>";   
                }
                echo "</select>";?>
        <input type='hidden' name='dept_code' class="input-xlarge" style='background:#E9E9E9;' readonly>
        <br/><br/>
        
        <span class="spanHeader">Department Name Change: </span>
        <input type='text' name='change_department_name' class="input-xlarge">        
        
        <input type='text' name='current_department' class="input-xlarge"  style='background:#E9E9E9;' readonly>            <br/><br/>

        <!-- PERSONAL INFORMATION -->
        
        <h2>Location</h2>
        <span class="spanHeader">Convo Location: </span>
            <?php
                echo "<select id='convoLocation' name='convoLocation'><option value=''>Select a Convo Location</option>";
                while($row = mysql_fetch_assoc($resultLocation)) {
                    echo "<option value = '" . $row['convo_location'] . "|" . $row['address'] . "|" . $row["city"] . "|" . $row["state"] . "|" . $row["zip_code"] . "|". $row["location_code"] . "'>" . $row['convo_location'] . "</option>";   
                }
                echo "</select>";?>
        <input type='hidden' name='location_code' class="input-xlarge" style='background:#E9E9E9;' readonly>
        <br/><br/>
        
        <span class="spanHeader">Convo Location: </span>
        <input type='text' name='change_convoLocation' class="input-xlarge">
        <input type='text' name='current_convoLocation' class="input-xlarge"  style='background:#E9E9E9;' readonly>
        <br/><br/>
        
        <span class="spanHeader">Address: </span>
        <input type='text' name='address' class="input-xlarge">
        <input type='text' name='current_address' class="input-xlarge" style='background:#E9E9E9;' readonly><br/><br/>
        
        <span class="spanHeader">City: </span>
        <input type='text' name='city' class="input-xlarge">
        <input type='text' name='current_city' class="input-xlarge" style='background:#E9E9E9;' readonly><br/><br/>
        
        <span class="spanHeader">State: </span>
            <select name="state" class="input-medium">
                <?= create_option_list($states, "state") ?>
            </select>
        <input type='text' name='current_state' class="input-small" style='background:#E9E9E9;' readonly><br/><br/>  
        
        <span class="spanHeader">Zip Code: </span>
        <input type='text' name='zipCode' class="input-small" maxlength="5">
        <input type='text' name='current_zipCode' class="input-small" style='background:#E9E9E9;' readonly><br/><br/>       
        <br/>
        <input type="submit" id="updateButton" name="submit" value="Update">
    </form>

<?php
include("includes/overall/footer.php"); 
?>