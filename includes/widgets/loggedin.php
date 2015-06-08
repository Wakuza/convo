<div class="widget">    <!-- Div class of widget starts -->
    <h2 id="hello">Hello <?php echo $user_data['firstname']; ?>!</h2>
    <div class="inner"> <!-- Div class of inner starts -->
        <div id ="statusBox" class="block"> <!-- Div class of statusBox starts -->
           <!-- <p id="showHide" onclick="clicked()"><a href="#"></a></p> -->
            
            <ul id = "status_logout">
                <li><a href="logout.php">Log out</a></li>
                <li><a href="changepassword.php">Change password</a></li>
                <!-- <li><a href="settings.php">Settings</a></li> -->
            </ul>
        </div>  <!-- Div class of statusBox ends -->
        
        <ul id="statusList">    <!-- ul id of statusList starts -->
            <li><strong>Role:</strong> <?php echo $user_data['position_name']; ?></li>
            <li><strong>Employment Status:</strong> <?php echo $user_data['payroll_status']; ?></li>
            <li><strong>Convo Location:</strong> <?php echo $user_data["convo_location"]; ?></li>
            <li><strong>Resident State:</strong> <?php echo $user_data["res_state"]; ?></li>
            <li>
                <?php
                    if(supervisor_name($session_user_id, "0") == false) {
                        echo "<strong>Supervisor Contact</strong><br/>" . $supervisor_data["firstname"] . " " . $supervisor_data["lastname"];
                    }
                ?>
            </li>
        </ul>   <!-- end of the STATUS LIST -->
    </div>  <!-- end of the inner -->
</div>  <!-- Div class of widget ends -->
