<?php
    // Email Function
    function email($to, $subject, $body) {
        mail($to, $subject, $body, "From: infini@gmail.com");
    }

    // Redirect the Page
    function logged_in_redirect() {
        if(logged_in() === true) {
            header("Location: index.php");  
            exit();
        }
    }

    // Protect Page
    function protect_page() {
        if(logged_in() === false) {
            header("Location: protected.php");
            exit();
        }
    }

    // Admin Protect Page 
    function admin_protect() {
        global $user_data;
        if(has_access($user_data["employeeID"]) === false) {
            header("Location: index.php");
            exit();
        }
    }

    // Manager Protect Page
    function manager_protect(){
        global $user_data;
        if(has_access_manager($user_data["employeeID"]) === false){
            header("Location: index.php");
            exit();
        }
    }

    // Census Protect Page
    function census_protect(){
        global $user_data;
        if(has_access_census($user_data["employeeID"]) === false){
            header("Location: index.php");
            exit();
        }
    }

    function array_sanitize(&$item) {
        $item = strip_tags(mysql_real_escape_string($item));
    }

    function html_sanitize($item) {
        $item = strip_tags(mysql_real_escape_string($item));
    }
    function sanitize($data) {
        return htmlentities(strip_tags(mysql_real_escape_string($data)));    
    }

    function output_errors($errors) {
        return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
    }
?>