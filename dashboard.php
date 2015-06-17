<?php 
    $title = "Convo Portal | Announcements";

    include("core/init.php");
    include("includes/overall/header.php");
    admin_protect();

    /*Video Interpreter*/
    $resultVI = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE job_code = 'INT007' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countVI = mysql_fetch_array($resultVI);

    /*Employment Status*/
    $resultActive = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE employment_status = 'Active'");
    $countActive = mysql_fetch_array($resultActive);
    
    $resultLeave = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE employment_status = 'Leave'");
    $countLeave = mysql_fetch_array($resultLeave);

    $resultTerminated = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE employment_status = 'Terminated'");
    $countTerminated = mysql_fetch_array($resultTerminated);

    /*Convo Location*/
    $resultMobile = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'AL01' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countMobile = mysql_fetch_array($resultMobile);
    
    $resultRoseville = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'CA01' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countRoseville = mysql_fetch_array($resultRoseville);

    $resultPleasanton = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'CA02' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countPleasanton = mysql_fetch_array($resultPleasanton);

    $resultFortWayne = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'IND01' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countFortWayne = mysql_fetch_array($resultFortWayne);
    
    $resultRochester = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'NY01' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countRochester = mysql_fetch_array($resultRochester);

    $resultNewYork = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'NY02' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countNewYork = mysql_fetch_array($resultNewYork);

    $resultAustin = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'TX01' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countAustin = mysql_fetch_array($resultAustin);

    $resultNone = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE location_code = 'NONE' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countNone = mysql_fetch_array($resultNone);


    /*Payroll Status*/

    $resultFT = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE payroll_status = 'FT' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countFT = mysql_fetch_array($resultFT);

    $resultPT = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE payroll_status = 'PT' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countPT = mysql_fetch_array($resultPT);

    $resultGBS = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE payroll_status = 'GBS' AND (employment_status = 'Active' OR employment_status = 'Leave')");
    $countGBS = mysql_fetch_array($resultGBS);
    
    /*Growth of hired emoployee*/
    //1 month
    $result1Month = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date BETWEEN CURDATE() - INTERVAL 1 MONTH AND CURDATE()");
    $count1Month = mysql_fetch_array($result1Month);
    //3 months
    $result3Months = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date BETWEEN CURDATE() - INTERVAL 3 MONTH AND CURDATE()");
    $count3Months = mysql_fetch_array($result3Months);
    //6 months
    $result6Months = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date BETWEEN CURDATE() - INTERVAL 6 MONTH AND CURDATE()");
    $count6Months = mysql_fetch_array($result6Months);
    //1 year
    $result1Year = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()");
    $count1Year = mysql_fetch_array($result1Year);
    //2 years
    $result2Years = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date BETWEEN CURDATE() - INTERVAL 2 YEAR AND CURDATE()");
    $count2Years = mysql_fetch_array($result2Years);
    //3+ years
    $result3YearsUP = mysql_query("SELECT COUNT('employee_id') FROM employee_vw WHERE hire_date > NOW() - INTERVAL 100 YEAR");
    $count3YearsUP = mysql_fetch_array($result3YearsUP);
    
?>

<h1 class="headerPages">Dashboard</h1>

<div id="resourcesLeft">
<h2>Video Interpreter</h2>
<span class="spanHeader">Number of VI:</span><?php echo $countVI[0]; ?><br/><br/>

<h2>Employment Status</h2>
<span class="spanHeader">Active employees:</span><?php echo $countActive[0]; ?><br/>
<span class="spanHeader">On leave employees:</span><?php echo $countLeave[0]; ?><br/>
<span class="spanHeader">Terminated employees:</span><?php echo $countTerminated[0]; ?><br/><br/>

<h2>Convo Location</h2>
<span class="spanHeader">Mobile, AL:</span><?php echo $countMobile[0]; ?><br/>
<span class="spanHeader">Pleasanton, CA:</span><?php echo $countPleasanton[0]; ?><br/>
<span class="spanHeader">Roseville, CA:</span><?php echo $countRoseville[0]; ?><br/>
<span class="spanHeader">Fort Wayne, IN:</span><?php echo $countFortWayne[0]; ?><br/>
<span class="spanHeader">New York, NY:</span><?php echo $countNewYork[0]; ?><br/>
<span class="spanHeader">Rochester, NY:</span><?php echo $countRochester[0]; ?><br/>
<span class="spanHeader">Austin, TX:</span><?php echo $countAustin[0]; ?><br/>
<span class="spanHeader">None:</span><?php echo $countNone[0]; ?><br/><br/>
</div>
<div id="resourcesRight">
<h2>Payroll Status</h2>
<span class="spanHeader">Full Time:</span><?php echo $countFT[0]; ?><br/>
<span class="spanHeader">Part Time:</span><?php echo $countPT[0]; ?><br/>
<span class="spanHeader">GBS:</span><?php echo $countGBS[0]; ?><br/><br/>



<h2>Hired Employees</h2>
<span class="spanHeader">Last a month ago:</span><?php echo $count1Month[0]; ?><br/>
<span class="spanHeader">Last 3 months ago:</span><?php echo $count3Months[0]; ?><br/>
<span class="spanHeader">Last 6 months ago:</span><?php echo $count6Months[0]; ?><br/>
<span class="spanHeader">Last a year ago:</span><?php echo $count1Year[0]; ?><br/>
<span class="spanHeader">Last 2 years ago:</span><?php echo $count2Years[0]; ?><br/>
<span class="spanHeader">More than 3 years ago:</span><?php echo $count3YearsUP[0]; ?><br/><br/>
</div>
<?php
    include("includes/overall/footer.php"); 
?>