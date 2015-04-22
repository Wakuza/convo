<?php 
    $title = "Convo Portal | Employees";
    include("core/init.php");
    manager_protect();
    include("includes/overall/header.php");
?>

<h1 class="headerPages">Employees</h1>

<?php
/*
    if(has_access($user_data["employeeID"]) === true){
    echo "<div id='hireOrTerm'>";
    echo "<a class='hireOrTerm' href='hire.php'>Add</a><a class='hireOrTerm' href='termination.php'>Edit</a><br/><br/><br/>";
    echo "</div>";
    }
*/
?>

<div id="active_terminate_radio">
    <input type="radio" class="active_terminate" name="active_terminate" value="active">Active &nbsp;&nbsp; 
    <input type="radio" class="active_terminate" name="active_terminate" value="leave">Leave &nbsp;&nbsp;
    <input type="radio" class="active_terminate" name="active_terminate" value="terminated">Terminated
    </div><br/>

<?php

    /*
    * See every employees
    */
    if($user_data["admin_privileges"] == 1) {
        $query = "SELECT e.employeeID, e.firstname, e.lastname, e.position_name, CONCAT(s.firstname, ' ', s.lastname) AS supervisor, e.hire_date, e.payroll_status, e.employment_status FROM employee s RIGHT JOIN employee e ON e.supervisorID = s.employeeID";
        $result = mysqli_query($link, $query);
    }
    // The managers only see the employees if they have their own supervisorID (name)
    else {
        $query = "SELECT e.employeeID, e.firstname, e.lastname, e.position_name, CONCAT(s.firstname, ' ', s.lastname) AS supervisor, e.hire_date, e.payroll_status, e.employment_status FROM employee s RIGHT JOIN employee e ON e.supervisorID = s.employeeID where e.supervisorID = " . $user_data["employeeID"];
        $result = mysqli_query($link, $query);   
    }

    $num_rows = mysqli_affected_rows($link);

    echo "<table id='example' class='display' cellspacing='0' width='1010px'>";
        if ($result && $num_rows > 0) { 
           echo "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th style='text-align:center;'>Position</th><th>Supervisor</th><th>Hire Date</th><th>Payroll Status</th><th>Status</th></tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                $x ="<tr><td>";
                if($user_data["admin_privileges"] == 1) {
                    $x .= "<a href='edit.php?employeeID=" . $row["employeeID"] . "'>" . $row["employeeID"] . "</a>";   
                }
                else {
                    $x .= $row["employeeID"];   
                }
                $x .= "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] .  "</td><td>" . $row["position_name"] . "</td><td>" . $row["supervisor"] . "</td><td>" . $row["hire_date"] . "</td><td>" . $row["payroll_status"]. "</td><td>" . $row["employment_status"] . "</td></tr>";
                
                echo $x;
            }
        }        
    echo "</tbody></table>";

    include("includes/overall/footer.php"); 
?>