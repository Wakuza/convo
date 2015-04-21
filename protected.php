<?php
    // This page is to protect the page when the users are not logged in.

    $title = "Convo Portal | Protected";
    include ("core/init.php");
    include("includes/overall/header.php");
?>

    <h1 class="headerPages">Sorry</h1>
    <p>You need to be logged in to access the page.</p>

<?php
    include("includes/overall/footer.php");
?>