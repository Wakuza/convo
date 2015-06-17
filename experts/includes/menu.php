            <nav id="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php
                        if(logged_in()) {
                    ?>
                            <li class='HRmenu'>
                                <a href="#">HR</a>
                                <ul>
                                    <li><a href="resources.php">Resources</a></li>
                                    <li><a href="employment_data.php">Employment Data</a></li>
                                <?php
                                    // Only full-time and part-time employees can see 401(k)
                                    if($user_data["payroll_status"] != "GBS"){
                                                
                                ?>
                                        <li><a href="401k.php">401(k)</a></li>   
                                <?php
                                    }
                                ?>
                                <?php
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
                                    </ul>
                                </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </nav>  <!-- Menu List Ends -->