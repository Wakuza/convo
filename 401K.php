<?php
    $title = "Convo Portal | Forms & Resources";
    include("core/init.php");
    protect_page();
    include("includes/overall/header.php");
?>

<h1 class="headerPages">401K Enrollment</h1>

<p>Convo is proud to sponsor a 401(k) plan for eligible employees.  We will match up to 25% of your 4%!</p>

<p>This 401(k) description will walk you through the basics of your plan and provide you with information to start contributing to your plan.</p>

<p>Have you ever looked at your pay stub and wished that so much of your hard-earned money didn’t have to go to taxes?  Do you wish you could redirect some of that money back into your own pocket?  That’s what a 401(k) allows you to do!  It allows you to save money without being taxed on it until withdrawal or retirement.  Not only are your deposits not taxed now, but your money also grows tax-deferred.  This is what’s commonly called pre-tax savings, and it’s available to you.</p>

<h2>A 401(k) plan is:</h2>
<ul class="fourOneK">
    <li>A pre-tax saving account</li>
    <li>A tax-deferred savings account</li>
    <li>Automatic – your contributions are deducted from your salary </li>
    <li>Your 401(k) plan includes a Roth feature.  As a result, you can 
        <ul>
            <li>Use after-tax contributions to fund tax-free retirement income</li>
            <li>Start making Roth contributions at any time </li>
            <li>As to whether this Roth option makes sense for you, you can consult with Danny Lacey at <a href="mailto:danny@kramerfinancial.com">danny@kramerfinancial.com</a></li>
        </ul>
    </li>
</ul>

<p>There are many reasons why a 401(k) plan should be important to you, the most important one being the standard of living you want to maintain after work.  As most companies no longer offer pension plans and Social Security may provide only a small portion of your retirement income needs, the time to start saving for retirement is now.</p>

<h2>Your responsibilities are: </h2>
<ul class="fourOneK">
    <li>To decide whether you wish to contribute </li>
    <li>To learn more about investing</li>
    <li>To choose how much you want to save </li>
    <li>To build your 401(k) portfolio by choosing and monitoring your investments </li>
</ul>

<h2>Convo's responsibilities are:</h2>
<ul class="fourOneK">
    <li>To give you a wide range of investment choices </li>
    <li>To provide you with investment education </li>
    <li>To offer easy access to your 401(k) </li>
</ul>

<h2>Other <span class="underline">reasons</span> to take advantage of your 401(k) plan now are: </h2>
<ul class="fourOneK">
    <li>Pre-tax savings and Convo match </li>
    <li> Tax-deferred compounded growth </li>
    <li>Waiting to save can cost you </li>
    <li>Greater benefits than an IRA </li>
    <li>Ability to take out a loan </li>
</ul>

<h2>A 401(k) is the most simple and effective retirement vehicle available to you.</h2>

<p>Here are some strategies to make the most out of your plan:</p>
<ul class="fourOneK">
    <li>Save the most that you can, the maximum if possible</li>
    <li>If you feel it is hard to begin saving, adopt <strong>1-10 strategy</strong>.  Start with 1% contribution, and then increase 1% each year until you reach 10% in 10 years. </li>
    <li>Know your objectives and stick to them </li>
    <li>Re-evaluate your 401(k) and investment strategy as your personal situation changes </li>
    <li>Keep it simple and easy to track by putting it all under one roof (if you have a 401(k) account at a previous employer, you can roll it over into your current 401(k) plan. </li>
    <li>Inform and educate yourself about your investment options.
        <ul>
            <li>Danny Lacey is available to meet with you.   Upon request, Danny will guide you through investment options.  There are <strong>three ways</strong> to make an investment decision, and you can decide which one makes the most sense to you: </li>
            <li><strong>Do it yourself –</strong> You feel comfortable to do research and make your own choices. </li>
            <li><strong>Do it with expert advice – </strong>Danny will review your time horizon, long-term goals and expectations, short-term risk attitude.  This discussion can be done through videophone, VRS, or in person.  This discussion can lead to creating your customized investment allocation.</li>
            <li><strong>Do it for me – </strong>You feel you don’t have time to do research.  You want to let professional managers allocate the funds for you.  In this case, you can select one of the Russell Allocation Models</li>
        </ul>
    </li>
</ul>
<br/>

<h2>More resources for 401K FAQs:</h2>
    <ul class='resources'>
        <?php
            if(has_access_manager($session_user_id) == true || has_access($session_user_id) == true) {
        ?>
            <li><a href="HR/401K/Administrator%20FAQ%20-%20not%20final.pdf" target="_blank">Adminstrative FAQ</a></li>
        <?php
            }
        ?>
            <li><a href="HR/401K/Employee%20FAQ%20-%20not%20final.pdf" target="_blank">Participant FAQ</a></li>
            <li><a href="HR/401K/enrollment.pdf">Enrollment</a></li>
    </ul>


    <iframe id="401Kvideo" width="600" height="450" style="margin-left: 200px; margin-top: 10px;" src="https://www.youtube.com/embed/IVHUjTSntDI"></iframe>


<?php
    include("includes/overall/footer.php"); 
?>