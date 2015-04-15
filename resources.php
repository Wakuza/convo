<?php
    $title = "Convo Portal | Resources";
    include("core/init.php");
    protect_page();
    include("includes/overall/header.php");
?>

<h1 class="headerPages">Resources</h1>

<h2>W-4 Form</h2>
<p>The W-4 is an Internal Revenue Service (IRS) form you complete to let your employer know how much money to withhold from your paycheck for federal taxes.</p>

<p><a class="policy" href="links/W-4%20form.pdf" target="_blank">W-4 Form</a></p>

<h2>2015 Payroll Schedule</h2>
<p>Here is the 2015 Payroll Schedule:</p>

<p><a class="policy" id="payrollButton" href="links/2015%20payroll%20schedule.pdf" target="_blank">2015 Payroll Schedule</a></p>


<?php
    if(logged_in()) {
        // CALL ATTENDANCE POLICY
?>
        <h2>Call Attendance Policy</h2>
        <p>Staffing in the call center is based on traffic control needs as well as providing support for co-workers.  It is for this reason, timeless and reliability are two of the most important measurements of performance and teamwork.</p>

        <p>We at Convo support your status in the community as well within the Call Centers therefore it is important to meet with your Supervisor about any scheduling changes that need to be made in a respectable time frame (2 weeks) from the scheduled shift.  While we recognize that some situations come up last minute, it is extremely important to take responsibility and meet with your Supervisor to communicate these critical situations that may have a severe impact on your schedule.  We here at Convo roll out our VI's schedules at least one month in advance; this is to give our VI's ample time to adjust accordingly.</p>

        <p>While Convo recognizes that "life happens", it is important that it not become a consistent behavior.</p>

        <p><a class = "policy" id="attendanceButton" href="links/Call%20Center%20Attendance%20Policy.pdf" target="_blank">Call Attendance Policy</a></p>

<?php
        }
        // FMLA POLICY
         if(has_access_manager($session_user_id) == true) {
?>
            <h2>FMLA Terms and Request Form</h2>
            <p>The Family and Medical Leave Act of 1993 (FMLA) is enforced by the Wage and Hour Division of the U.S. Department of Labor. It requires covered employers to grant up to 12 workweeks of unpaid leave in a 12 month period with job restoration and continuation of benefits to Eligible Employees who need to care for themselves or qualified family members. Qualified family member means spouse/domestic partner, child and parent.</p>

            <p><a class="policy" id="FMLAButton" href="links/FMLA%20Terms%20and%20Request%20Form.pdf" target="_blank">FMLA Terms and Request Form</a></p>
<?php        
         }
        // SUPERVISOR HANDBOOK
        if(has_access_manager($session_user_id) == true) {
?>
            <h2>Supervisor Handbook</h2>
            <p>This Supervisor Handbook explains about the supervisor role and responsibilities.</p>

            <p><a class = "policy" id = "handbookButton" href="links/Supervisor%20Handbook2013.pdf" target="_blank">Supervisor Handbook</a></p>
<?php
        }
?>

    <h2>Support Employee</h2>
    <p>Convo Support Employee categories explain about the benefits with your employment status.</p>
    <p><a class = "policy" id="supportButton" href="links/Support%20Employee%20Categories.pdf" target="_blank">Support Employee Categories</a></p>

<?php
    include("includes/overall/footer.php"); 
?>