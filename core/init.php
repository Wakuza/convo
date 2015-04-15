<?php
    session_start();
 
    require "database/connect.php";
    require "functions/users.php";
    require "functions/general.php";

    $current_file = explode("/", $_SERVER["SCRIPT_NAME"]);
    $current_file = end($current_file);

    if(logged_in() === true) {
        $session_user_id = $_SESSION['employeeID'];
        
        $user_data = user_data($session_user_id, 'employeeID', "supervisorID", 'username', 'password', 'firstname', 'lastname', 'position_name', 'payroll_status', 'convo_location', 'res_state', 'password_recover', 'admin_privileges', 'date_of_birth', 'ssn', 'street_address', 'city', 'zipcode');
                
        $supervisor_data = supervisor_data($session_user_id, 'employeeID', "supervisorID", 'firstname', 'lastname');
        
        if(user_active($user_data["username"]) === false) {
            session_destroy();
            header("Location: index.php");
            exit();
        }

        // This one forces the user to change the password when they click "forget the password"
        if($current_file !== "changepassword.php" && $current_file !== "logout.php" && $user_data["password_recover"] == 1) {
            header("Location: changepassword.php?force");
            exit();
        }
    }
    
    $errors = array();
?>