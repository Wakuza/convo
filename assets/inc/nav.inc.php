            <nav id="primaryNav">   <!-- Primary Navigation -->
                <ul>    <!-- Main Navigation -->
                    <li><a href="./../index.php">Home</a></li>
<?php
    // Employee is able to show the menus wen they are logged in
    if(logged_in()) {
?>
                    <li>
                        <a href="#">HR</a>
                        <ul class="HR">
                            <li><a href="resources.php">Resources</a></li>
                            <li><a href="employment_data.php">Employment Data</a></li>
<?php
    // Only full-time and part-time employees can see 401(k)
    if($user_data["payroll_status"] != "GBS"){

?>
                             <li><a href="401k.php">401(k)</a></li>                          
<?php
    }
    // Only full-time employees can see Open Enrollment
    // Exception is Monique Clark (emplid 229) who is considering full time and wants to check benefits before deciding
    if($user_data["payroll_status"] == "FT" || $session_user_id == '229'){

?>
                             <li><a href="OpenEnrollment.php">Open Enrollment</a></li>   
<?php
    }
?>
                        </ul>      
                    </li>
                    <li>
                        <a href="#">Experts</a>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="experts/heart_of_convo_expert.php">Heart of Convo Expert</a></li>
                            <li><a href="#">Milestones</a></li>
                            <li>
                                <a href="#">Toolbox</a>
                                <ul>
                                    <li><a href="#">Expert Tools</a></li>
                                    <li><a href="#">Color Your Home</a></li>
                                    <li><a href="#">Procedures &amp; Features</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Badge System</a>
                                <ul>
                                    <li><a href="#">Convo Expert</a></li>
                                    <li><a href="#">Local Expert</a></li>
                                    <li><a href="#">National Expert</a></li>
                                    <li><a href="#">Support Expert</a></li>
                                    <li><a href="#">Top Expert</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Convo University</a>
                        <ul class="convo_university">
                            <li><a href="log.php">Log</a></li>
                        </ul>
                    </li>
<?php
        if(has_access_census($user_data["job_code"]) == true){
?>
                    <!--<li><a href="census.php">Census</a></li>-->
<?php
        }
        if(has_access_manager($user_data["job_code"]) == true) {
?>
                    <li><a href="employee.php">Employees</a></li>
<?php
        }
        if(has_access($user_data["job_code"]) == true) {
?>
                    <li>
                        <a href="#">Admin</a>
                        <ul>
                            <li><a href="hire.php">Add Employee</a></li>
                            <li><a href="edit.php">Edit Employee</a></li>
                            <li><a href="createdatabase.php">Add DB Values</a></li>
                            <li><a href="editdatabase.php">Edit DB Values</a></li>
                            <li><a href="announcements.php">Announcements</a></li>
                            <li><a href="files_uploaded.php">Files Uploaded</a></li>
                            <li><a href="dashboard.php">Dashboard</a></li>
                        </ul>
                    </li>
<?php
        }
    }
?>
                </ul> <!-- Main Navigation // -->
            </nav>  <!-- Primary Nav Ends -->