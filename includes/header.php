        <header>    <!-- Header Starts -->
            <a href="https://www.theinfini.com" target="_blank"><img id="infinilogo" src="images/infini.svg" alt="Infini" width="250"/></a>    
            <aside> <!-- Aside starts -->
                <?php                 
                    if(logged_in() === true) {
                        include("includes/widgets/loggedin.php");
                    }
                    else {
                        include("includes/widgets/login.php");
                    }
                ?>
            </aside>    <!-- Aside ends -->
            
            <?php include("includes/menu.php"); ?>
            
            <div class="clear"></div>
        </header>   <!-- Header ends -->