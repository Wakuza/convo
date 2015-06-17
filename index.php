<?php 
    $title = "Convo Portal";
    include("core/init.php");
    include("includes/overall/header.php");

    $today = date('Y-m-d H:i:s');
    //echo $today . "<br/>";
/*
    $queryFutAnnouncement = "SELECT * FROM announcement_vw WHERE announcement_id = 2";
    $resultA = mysqli_query($link, $queryFutAnnouncement);
    $num_rows_viewA = mysqli_affected_rows($link);
    if($resultA && $num_rows_viewA > 0) {
    while($row = mysqli_fetch_assoc($resultA)){
        $content = $row["home_page"];
        $effective_date = $row["effective_date"];
    }
    }*/
    
    //$query = "CALL search_announcement(2, '$content', '$effective_date')";
    //echo $query;
    //mysqli_query($link, $query);
?>

<br/><br/><br/><br/>

<?php

    $queryView = "SELECT * FROM announcement_vw WHERE NOW() >= effective_date ORDER BY effective_date DESC";
    $resultView = mysqli_query($link, $queryView);
    $num_rows_view = mysqli_affected_rows($link);
    if($resultView && $num_rows_view > 0 && logged_in() == true) {
        //while($row = mysqli_fetch_assoc($resultView)){
            $row = mysqli_fetch_assoc($resultView);
            echo "<strong>" . $row["effective_date"] . "</strong><br/><br/>";
            echo $row["home_page"];
        //}
    }
    else {
        echo "<h2>Please login or <a href='register.php'>register</a> to access the Portal.</h2>";
    }
    /*
    // Announcements to get values
    $queryAnnouncements = "SELECT * FROM announcement_vw where announcement_id = 2";
    $result = mysqli_query($link, $queryAnnouncements);
    $num_rows = mysqli_affected_rows($link);

    if($result && $num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $content = $row["home_page"];
            $effective_date = $row["effective_date"];
        }
    }


    if(logged_in() == true){
        //$query = "CALL search_announcement(1, '$content', '$effective_date')";
        mysql_query("CALL search_announcement(1, '$content', '$effective_date')");
        $query = "SELECT * FROM announcement_vw where announcement_id = 1";
        $result_content = mysqli_query($link, $query);
        $num_rows_content = mysqli_affected_rows($link);
        if($result_content && $num_rows_content > 0) {
           while($row = mysqli_fetch_assoc($result_content)) {
               echo $row["home_page"];
           }
        }
    }
    else {
        echo "<h2>Please login or <a href='register.php'>register</a> to access the Portal.</h2>";
    }
    */

/*    
//Anniversary for Employees !!!!
    $query = "SELECT firstname, lastname, hire_date, CONCAT(MONTH(hire_date), '/', DAY(hire_date)) AS hireDate FROM employer WHERE (employment_status = 'Active' OR employment_status = 'Leave') AND DATE_ADD(hire_date, INTERVAL YEAR(CURDATE())-YEAR(hire_date) YEAR) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND DATE_ADD(CURDATE(), INTERVAL 0 DAY) ORDER BY hireDate ASC";
    $result = mysqli_query($link, $query);
    $num_rows = mysqli_affected_rows($link);

    if($result && $num_rows > 0) {
        echo "<h1>Happy Anniversary to Employees who have been working</h1>";
        while($row = mysqli_fetch_assoc($result)){
            if((date("Y") - date($row["hire_date"])) == 1){
                echo $row["firstname"] . " " . $row["lastname"] . " " . (date("Y") - date($row["hire_date"])) . " year (" . $row["hireDate"] . ")<br/>";   
            }
            else if((date("Y") - date($row["hire_date"])) == 0){
                //doing nothing, just hide new employee   
            }
            else{
                echo $row["firstname"] . " " . $row["lastname"] . " " . (date("Y") - date($row["hire_date"])) . " years (" . $row["hireDate"] . ")<br/>";
            }
        }
    }

    echo "<br/><br/>";
    //Birthday for Employees !!!!
    $query2 = "SELECT firstname, lastname, CONCAT(MONTH(date_of_birth), '/', DAY(date_of_birth)) AS birthday FROM employer WHERE (employment_status = 'Active' OR employment_status = 'Leave') AND DATE_ADD(date_of_birth, INTERVAL YEAR(CURDATE())-YEAR(date_of_birth) YEAR) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND DATE_ADD(CURDATE(), INTERVAL 0 DAY) ORDER BY birthday ASC";
    $result2 = mysqli_query($link, $query2);
    $num_rows2 = mysqli_affected_rows($link);

    if($result2 && $num_rows2 > 0) {
        echo "<h1>Happy Birthday!</h1>";
        while($row = mysqli_fetch_assoc($result2)){
            echo $row["firstname"] . " " . $row["lastname"] . " - " . $row["birthday"] ."<br/>";    
        }
    }
*/
    include("includes/overall/footer.php"); 
?>
