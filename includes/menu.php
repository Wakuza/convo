            <nav id="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php
                        if(logged_in()) {
                            if(has_access_census($session_user_id) == true){
                    ?>
                                    <li><a href="census.php">Census</a></li>
                    <?php
                            }
                        }
                    ?>
                    <!-- <li><a href="resources.php">Resources</a></li> -->
                    <?php
                        if(logged_in()) {
                            if(has_access_manager($session_user_id) == true) {
?>
                   <!-- <li><a href="employee.php">Employees</a></li> -->
                    <?php
                            }
                        }

                        if(logged_in()) {
                            if(has_access($session_user_id) == true) {
                    ?>
                    <li>
                        <a href="#">Admin</a>
                        <ul>
                            <li><a href="hire.php">Add new employees</a></li>
                            <li><a href="termination.php">Changes</a></li>
                            <li><a href="announcements.php">Announcements</a></li>
                        </ul>
                    </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </nav>  <!-- Menu List Ends -->