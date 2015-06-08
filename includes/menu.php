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
                                <?php
                            //$user_data["payroll_status"] != "GBS" ||
                                    if(has_access($session_user_id) == true){
                                                
                                ?>
                                        <li><a href="401k.php">401K</a></li> 
                                        <li><a href="enrollment.php">Open Enrollment</a></li>
                                <?php
                                    }
                                ?>
                                </ul>      
                            </li>
                        
                    <?php
                            if(has_access_census($session_user_id) == true){
                    ?>
                                <!--<li><a href="census.php">Census</a></li>-->
                    <?php
                            }
                            if(has_access_manager($session_user_id) == true) {
                    ?>
                                <li><a href="employee.php">Employees</a></li>
                    <?php
                            }
                            
                            if(has_access($session_user_id) == true) {
                    ?>
                                <li>
                                    <a href="#">Admin</a>
                                    <ul>
                                        <li><a href="hire.php">Add Employee</a></li>
                                        <li><a href="edit.php">Edit Employee</a></li>
                                        <li><a href="createdatabase.php">Add Database</a></li>
                                        <li><a href="editdatabase.php">Edit Database</a></li>
                                        <li><a href="announcements.php">Announcements</a></li>
                                    </ul>
                                </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </nav>  <!-- Menu List Ends -->