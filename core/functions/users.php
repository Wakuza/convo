<?php
    /*
    * LOGIN FUNCTIONS
    */

    // employee ID from the username will apply to the Login Function below
    function user_id_from_username($username) {
        $username = sanitize($username);
        $query = mysql_query("SELECT employeeID FROM employee WHERE username = '$username'");
        return mysql_result($query, 0, "employeeID");
    }

    function login($username, $password) {
        $user_id = user_id_from_username($username);
        
        $username = sanitize($username);
        $password = md5($password);
        
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE username = '$username' AND password = '$password'");
        
        return(mysql_result($query, 0) == 1) ? $user_id : false;
    }

    function logged_in() {
        return(isset($_SESSION['employeeID'])) ? true : false;   
    }

    // The users are active when they register the usernames
    function user_active($username) {
        $username = sanitize($username);
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE username = '$username' AND active = 1");
        return(mysql_result($query, 0) == 1) ? true : false;      
    }

    /*
    * REGISTRATION FUNCTIONS
    */

    // VERIFY SSN and DOB
    function census_verify_exists($ssn, $dob) {
        $ssn = sanitize($ssn);
        $dob = sanitize($dob);
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE ssn = '$ssn' AND date_of_birth = '$dob'");
        return(mysql_result($query, 0) == 1) ? true : false;
    }

    // Register the username
    function register_user($register_data, $ssn, $dob) { 
        array_walk($register_data, "array_sanitize");
        $password = md5($register_data["password"]);
        //$password = $register_data["password"];
        $username = $register_data["username"];
        //$register_data["ssn"] = md5($register_data["ssn"]);
        //$ssn = $register_data["ssn"];
        
        $fields = "" . implode(", ", array_keys($register_data)) . "";
        $data = "\"" . implode("\" , \"", $register_data) . "\"";
        
        mysql_query("UPDATE employee SET username = '$username', password = '$password' WHERE ssn = '$ssn' AND date_of_birth = '$dob'");

        /*email($register_data["email"], "Activate your account", "
            Hello " . $register_data["firstname"] . ",\n\nYou need to activiate your account, so use the link below:\n\nhttp://localhost/testing/activiate.php?email=" . $register_data["email"] . " &email_code=" . $register_data["email_code"] . "\n\n-Infini Consulting");*/
    }

    /*
    * UPDATE FUNCTIONS
    */

    // Whenever the employees update the information
    function update_user($user_id, $update_data) { 
        $update = array();
        array_walk($update_data, "array_sanitize");

        foreach($update_data as $field => $data) {
            $update[] = "$field = \"$data\"";
        }
        mysql_query("UPDATE employee SET " . implode(", ", $update) . " WHERE employeeID = '$user_id'") or die(mysql_error());
    }

    function change_password($user_id, $password) {
        $user_id = $user_id;
        //setcookie("password", $password, time() + 7200);
        $password = md5($password); 
        mysql_query("UPDATE employee SET password = '$password', password_recover = 0 WHERE employeeID = '$user_id'");    
    }

    /*
    * ACCESS FUNCTIONS
    */

    // Employee Page - Access for Hire and Changes(Terminations)
    function has_access($user_id) {
        $user_id = $user_id;
        //$type = (int)$type;
        
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE employeeID = '$user_id' AND admin_privileges = '1'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    // Manager Access - Links buttons visible and unvisible if they are not manager.
    function has_access_manager($user_id) {
        $user_id = $user_id;    
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE employeeID = '$user_id' AND manager_privileges = '1'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    // Policy Access allows to see the links depending on the positions.
    function policy_access($user_id, $position) {
        $user_id = $user_id;
        
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE employeeID = '$user_id' AND position_name = '$position'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    // Employee's information
    function user_data($user_id) {
        $data = array();
        $user_id = $user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        
        if($func_num_args > 1) {
            unset($func_get_args[0]);
            
            $fields = "" . implode(", ", $func_get_args) . "";
            $query = mysql_query("SELECT $fields FROM employee WHERE employeeID = '$user_id'");
            //$result = mysql_result($link, $query);
            $data = mysql_fetch_assoc($query);
            
            return $data;
        }
    }

    /*
    * CENSUS DATA FUNCTIONS 
    */

    // Census Access for the full-time employees only.
    function has_access_census($user_id) {
        $user_id = $user_id;    
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE employeeID = '$user_id' AND payroll_status = 'FT'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    // Census Data collects the employees' information from the database.
    function census_data($user_id) {
        $data = array();
        $user_id = $user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        
        if($func_num_args > 1) {
            unset($func_get_args[0]);
            
            $fields = "" . implode(", ", $func_get_args) . "";
            $query = mysql_query("SELECT $fields FROM employee WHERE employeeID = '$user_id'");
            //$result = mysql_result($link, $query);
            $data = mysql_fetch_assoc($query);
            
            return $data;
        }
    }

    /*
    * DATA FUNCTIONS
    */

    // Supervisor Name function to get the employee's name
    function supervisor_name($user_id, $supervisor_id) {
        $user_id = $user_id;
        
        $query = mysql_query("SELECT COUNT('supervisorID') FROM employee WHERE employeeID = '$user_id' AND supervisorID = '$supervisor_id'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    // Supervisor Data - get the information from the supervisors
    function supervisor_data($user_id) {
        $data = array();
        $user_id = $user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        
        if($func_num_args > 1) {
            unset($func_get_args[0]);
            
            $fields = "s." . implode(", s.", $func_get_args) . "";
            $query = mysql_query("SELECT $fields FROM employee s INNER JOIN employee e ON s.employeeID = e.supervisorID WHERE e.employeeID = '$user_id'");
            $data = mysql_fetch_assoc($query);
            
            return $data;
        }
    }

    
    /*
    * EXIST FUNCTIONS
    */

    // User Exists - can't have twice same username and must be unique
    function user_exists($username) {
        $username = sanitize($username);
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE username = '$username'");
        return(mysql_result($query, 0) == 1) ? true : false;
    }

    // Employee ID Exists - must be unique and can't be same employeeID
    function employee_id_exists($employeeID) {
        $employeeID = sanitize($employeeID);
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE employeeID = '$employeeID'");
        return(mysql_result($query, 0) == 1) ? true : false;
    }

    /*
    * EMAIL FUNCTIONS
    */
/*
    function user_id_from_email($email) {
        $email= sanitize($email);
        $query = mysql_query("SELECT employeeID FROM employee WHERE email = '$email'");
        return mysql_result($query, 0, "employeeID");
    }
    
    function recover($mode, $email) {
        $mode = sanitize($mode);
        $email = sanitize($email);

        $user_data = user_data(user_id_from_email($email), "employeeID", "firstname", "username");

        if($mode == "username") {
            // Recover username
            email($email, "Your username", "Hello " . $user_data["firstname"] . "\n\nYour username is: " . $user_data["username"] . "\n\n -Infini Consulting");
        }
        else if($mode == "password") {
            // Recover password
            $generated_password = substr(md5(rand(999, 999999)), 0, 8);
            //die($generated_password);
            change_password($user_data["employeeID"], $generated_password);

            update_user($user_data["employeeID"], array("password_recover" => "1"));

            email($email, "Your password recovery", "Hello " . $user_data["firstname"] . "\n\nYour new password is: " . $generated_password . "\n\n -Infini Consulting");

        }
    }
    
    function email_exists($email) {
        $emil= sanitize($email);
        $query = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE email = '$email'");
        return(mysql_result($query, 0) == 1) ? true : false;
    }
    
    function activate($email, $email_code) {
        $email      = mysql_real_escape_string($email);
        $email_code = mysql_real_escape_string($email_code);
        $query  = mysql_query("SELECT COUNT('employeeID') FROM employee WHERE email = '$email' AND email_code = '$email_code' AND active = 0");
        if(mysql_result($query, 0) == 1) {
            // query to update user active status
            mysql_query("UPDATE employee SET active = 1 WHERE email = '$email'");
            return true;
        }
        else {
            return false;
        }

    }
*/
?>