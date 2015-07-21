<?php
    $page_title = "Approval Center";
    $title = "Convo Portal | Approval Center";
    include("../core/init.php");
    protect_page();
    include("../assets/inc/header.inc.php");

    //$query_log = "CALL insert_log('$session_user_id', CURRENT_TIMESTAMP)";
    //mysqli_query($link, $query_log);

?>

<h1 class="headerPages">Approval Center</h1>

<?php
    echo "<table class='table table-bordered table-hover' id='tab_logic'>";
    echo "<thead><tr>";
    echo "<th>EAF ID</th><th>Employee ID</th><th>Employee Name</th><th>EAF Type</th><th>Effective Date</th>";
    echo "</thead></tr><tbody>";

    $query = "SELECT eaf.eaf_id, eaf.employee_id, CONCAT(e.lastname, ', ', e.firstname) AS name, eaf.eaf_type, eaf.effective_date FROM employee_action_form eaf INNER JOIN employee e ON e.employee_id = eaf.employee_id";

    $result = mysqli_query($link, $query);
    $num_rows = mysqli_affected_rows($link);
    if ($result && $num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["eaf_id"] . "</td><td>" . $row["employee_id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["eaf_type"] . "</td><td>" . $row["effective_date"] . "</td></tr>";
        }
    }  
    echo"</tbody></table>";

    include("../assets/inc/footer.inc.php");
?>