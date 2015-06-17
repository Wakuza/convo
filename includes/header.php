        <header>
            <div class="infini-logo">
            <a href="https://www.theinfini.com" target="_blank"><img id="infinilogo" src="images/infini.svg" alt="Infini" width="250"/></a></div>

            <aside>
                <?php      
                    if(isset($_POST["login"])){
                        if($_POST["username"] == "tester" && $_POST["password"] == "DBacce$$"){
                            header("Location: selectEmployee.php");   
                        }
                    }
                    else if(logged_in() === true) {
                        include("includes/widgets/loggedin.php");
                    }
                    else {
                        include("includes/widgets/login.php");
                    }
                ?>
            </aside>
            <?php include("includes/menu.php"); ?>
            <div class="clear"></div>
        </header>