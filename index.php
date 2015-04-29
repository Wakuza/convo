<?php 
    $title = "Convo Portal";
    include("core/init.php");
    include("includes/overall/header.php");
?>
<br/><br/><br/><br/>

<?php
    // Announcements
    $queryAnnouncements = "SELECT home_page FROM announcements";
    $result = mysqli_query($link, $queryAnnouncements);
    $num_rows = mysqli_affected_rows($link);

    if($result && $num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo $row["home_page"];
        }
    }

    //Anniversary for Employees !!!!
    $query = "SELECT firstname, lastname, hire_date, CONCAT(MONTH(hire_date), '/', DAY(hire_date)) AS hireDate FROM employee WHERE (employment_status = 'Active' OR employment_status = 'Leave') AND DATE_ADD(hire_date, INTERVAL YEAR(CURDATE())-YEAR(hire_date) YEAR) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND DATE_ADD(CURDATE(), INTERVAL 0 DAY) ORDER BY hireDate ASC";
    $result = mysqli_query($link, $query);
    $num_rows = mysqli_affected_rows($link);

    if($result && $num_rows > 0) {
        echo "<h1>Happy Anniversary to Employees who have been working</h1>";
        while($row = mysqli_fetch_assoc($result)){
            if((date("Y") - date($row["hire_date"])) == 1){
                echo $row["firstname"] . " " . $row["lastname"] . " - " . (date("Y") - date($row["hire_date"])) . " year (" . $row["hireDate"] . ")<br/>";   
            }
            else{
                echo $row["firstname"] . " " . $row["lastname"] . " - " . (date("Y") - date($row["hire_date"])) . " years (" . $row["hireDate"] . ")<br/>";
            }
        }
    }

    echo "<br/><br/>";
    //Birthday for Employees !!!!
    $query2 = "SELECT firstname, lastname, CONCAT(MONTH(date_of_birth), '/', DAY(date_of_birth)) AS birthday FROM employee WHERE (employment_status = 'Active' OR employment_status = 'Leave') AND DATE_ADD(date_of_birth, INTERVAL YEAR(CURDATE())-YEAR(date_of_birth) YEAR) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND DATE_ADD(CURDATE(), INTERVAL 0 DAY) ORDER BY birthday ASC";
    $result2 = mysqli_query($link, $query2);
    $num_rows2 = mysqli_affected_rows($link);

    if($result2 && $num_rows2 > 0) {
        echo "<h1>Happy Birthday!</h1>";
        while($row = mysqli_fetch_assoc($result2)){
            echo $row["firstname"] . " " . $row["lastname"] . " - " . $row["birthday"] . "<br/>";    
        }
    }
    include("includes/overall/footer.php"); 
?>
