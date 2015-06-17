<div class="widget">
    <h2 id="hello">Hello <?php echo $user_data['firstname']; ?>!</h2>
    <div class="inner">
        <div id ="statusBox" class="block">
            <!--<p id="showHide" onclick="clicked()"><a href="#"></a></p>-->
            
            <ul id = "status_logout">
                <li><a href="logout.php">Log out</a></li>
                <li><a href="changepassword.php">Change password</a></li>
            </ul>
        </div>
        <!--<div class="block">
        <ul id="statusList">
                <li>
                    <strong>Role:</strong> <?php echo $user_data['position_name']; ?><br/>
                    <strong>Employment Status:</strong> <?php echo $user_data['payroll_status']; ?><br/>
                </li>
                <li>
                    <?php 
                        echo "<strong>Convo Location: </strong>" . $user_data['convo_location'] ."<br/><strong>Resident State: </strong> " .  $user_data['res_state']; ?>
                </li>
                <li>
                    <?php
                        if(supervisor_name($session_user_id, "0") == false) {
                            echo "<strong>Supervisor Contact</strong><br/>" . $supervisor_data["firstname"] . " " . $supervisor_data["lastname"];
                        }
                    ?>
                </li>
            </ul>
        </div>-->
    </div>
</div>