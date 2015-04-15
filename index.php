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
    $query = "SELECT * FROM employee WHERE MONTH(hire_date)=MONTH(CURDATE()) AND DAY(hire_date)=DAY(CURDATE())";
    $result = mysqli_query($link, $query);
    $num_rows = mysqli_affected_rows($link);

    if($result && $num_rows > 0) {
        echo "<h1>Happy Anniversary to Employees who have been working</h1>";
        while($row = mysqli_fetch_assoc($result)){
            if((date("Y") - date($row["hire_date"])) == 1){
                echo $row["firstname"] . " " . $row["lastname"] . " " . (date("Y") - date($row["hire_date"])) . " year<br/>";   
            }
            else{
                echo $row["firstname"] . " " . $row["lastname"] . " " . (date("Y") - date($row["hire_date"])) . " years<br/>";
            }
        }
    }

    echo "<br/><br/>";
    //Birthday for Employees !!!!
    $query2 = "SELECT * FROM employee WHERE MONTH(date_of_birth)=MONTH(CURDATE()) AND DAY(date_of_birth)=DAY(CURDATE())";
    $result2 = mysqli_query($link, $query2);
    $num_rows2 = mysqli_affected_rows($link);

    if($result2 && $num_rows2 > 0) {
        echo "<h1>Happy Birthday!</h1>";
        while($row = mysqli_fetch_assoc($result2)){
            echo $row["firstname"] . " " . $row["lastname"] . "<br/>";    
        }
    }

    include("includes/overall/footer.php"); 
?>
