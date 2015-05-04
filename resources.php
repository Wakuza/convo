<?php
    $title = "Convo Portal | Forms & Resources";
    include("core/init.php");
    protect_page();
    include("includes/overall/header.php");
?>

<h1 class="headerPages">Forms &amp; Resources</h1>
<div class="resourcesContent">
    <div id="resourcesLeft">
        <h2>Employee Resources</h2>
        <ul class="resources">
            <li><a href="links/2015%20payroll%20schedule.pdf" target="_blank">2015 Payroll Schedule</a></li>
        </ul><br/>
    <?php
        if(logged_in()) {
            if(has_access_manager($session_user_id) == true) {
    ?>
                <h2>Manager Resources</h2>
                <ul class="resources">
                    <li><a href="links/Supervisor%20Handbook2013.pdf" target="_blank">Manager Guidelines</a></li>
                    <li><a href="links/FMLA%20Terms%20and%20Request%20Form.pdf" target="_blank">FMLA Terms and Request Form</a></li>
                </ul><br/>
    <?php
            }   // end has_access_manager
            if(has_access_interpreting($session_user_id) == true || has_access($session_user_id) == true) {
    ?>
                <h2>Interpreting Resources</h2>
                <ul class="resources">
                    <li><a href="links/Call%20Center%20Attendance%20Policy.pdf" target="_blank">Call Center Attendance Policy</a></li>
                </ul><br/>
    <?php
            }   // end has_access_Interpreting and has_access
            if(has_access_support($session_user_id) == true || has_access($session_user_id) == true) {
    ?>
                <h2>Convo Support</h2>
                <ul class="resources">
                    <li><a href="links/Support%20Employee%20Categories.pdf" target="_blank">Support Employee Categories</a></li>
                </ul><br/>
    <?php
            }
        }   // end of logged_in()) 
    ?>
    </div>
    <div id="resourcesRight">
        <h2>Tax Forms</h2>
        <ul class="resources">
            <li><a href="http://www.irs.gov/pub/irs-pdf/fw4.pdf" target="_blank">Federal Form W-4</a></li>
<?php
            if($user_data["res_state"] == "AL" || has_access($session_user_id) == true) {
?>
                <li><a href="http://revenue.alabama.gov/incometax/itformsindex.cfm" target="_blank">Alabama State Tax Forms</a></li>
<?php
            }
            if($user_data["res_state"] == "CA" || has_access($session_user_id) == true) {
?>
                <li><a href="https://www.ftb.ca.gov/forms/search/index.aspx" target="_blank">California State Tax Forms</a></li>
<?php
            }
            if($user_data["res_state"] == "IN" || $user_data["res_state"] == "OH" || has_access($session_user_id) == true) {
?>
                <li><a href="http://www.in.gov/dor/3489.htm" target="_blank">Indiana State Tax Forms</a></li>
<?php
            }
            if($user_data["res_state"] == "NY" || has_access($session_user_id) == true) {
?>
                <li><a href="http://www.tax.ny.gov/forms/" target="_blank">New York State Tax Forms</a></li>
<?php
            }
?>
        </ul>
        <h2>401K</h2>
        <ul class="resources">
<?php
            if(has_access_manager($session_user_id) == true || has_access($session_user_id) == true) {
?>
                <li><a href="links/Administrative%20FAQ.pdf" target="_blank">Administrative FAQ</a></li>
<?php              
            }
?>
            <li><a href="links/Participant%20FAQ.pdf" target="_blank">Participant FAQ</a></li>
            <li><a href="links/Convo%20FAQ%20video.mp4" target="_blank">Convo FAQ about 401K</a></li>
        </ul>
<?php
?>
    </div>
</div>

<?php
    include("includes/overall/footer.php"); 
?>