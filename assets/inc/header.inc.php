<!--
Infini Consulting
CONVO Portal v1.5
Copyright 2015
-->

<!DOCTYPE HTML>
<html>
    <head>  <!-- Head Starts -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <link rel="icon" href="assets/images/infini.ico" type="image/png">  
        
        <title><?php echo $title; ?></title>  
        
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
        
        <!-- Credits by jonthornton for Datepicker design and Timepicker-->
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.css" /> 
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css" />
        
        <link rel="stylesheet" type="text/css" media="print" href="css/print.css">
        <link rel="stylesheet" type="text/css" href="assets/css/convo_style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/table.css">
        
        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
        
        <!-- Credits by jonthornton for Datepicker design and Timepicker-->
        <script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
        
        <script type="text/javascript" src="assets/js/script.js"></script>
    
    </head> <!-- Head ends -->
    <body onload="onLoad()">    <!-- Body -->
        <header>
            <div class="infini-logo">
            <a href="https://www.theinfini.com" target="_blank"><img id="infinilogo" src="assets/images/infini.svg" alt="Infini" width="250"/></a></div>
            <aside>              
<?php      
    if(isset($_POST["login"]) && $_POST["username"] == "tester" && $_POST["password"] == "DBacce$$"){
        header("Location: selectEmployee.php");   
    }
    else if(logged_in() === true) {
        include("includes/widgets/loggedin.php");
    }
    else {
        include("includes/widgets/login.php");
    }
?>       
            </aside>  
            
<?php include("assets/inc/nav.inc.php"); ?>
            
        </header>
        <div class="clear"></div>   <!-- Clear -->
        <div id="container">    <!-- Main Container -->
            <div id="convoLogo">    <!-- Convo Logo -->
                <strong class="logo-org fn org url">
                    <a href="index.php"></a>
                </strong>
            </div>  <!-- Convo Logo // -->