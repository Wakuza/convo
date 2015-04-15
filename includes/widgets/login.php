<div class="widget">    <!-- Div class of Widget starts -->
    <div class="inner"> <!-- Div class of inner starts -->
        <form action="login.php" method="post" id="loginBox">
            <ul id="login">
                <li>
                    <input type="text" name="username" placeholder="Username" <?php if(isset($_COOKIE['username'])){echo "value ='" . $_COOKIE['username'] . "'";} ?>>
                </li>
                <li>
                    <input type="password" name="password" placeholder="Password" <?php if(isset($_COOKIE['password'])){echo "value ='" . $_COOKIE['password'] . "'";} ?>>
                </li>
                <li>
                    <input type="submit" value="Login" id="logIn">
                </li>
                <li id="rememberBox">
                    <input type="checkbox" value="RememberMe" id="remBox" name="remBox">Remember Me
                </li>
                <br/><br/><br/><br/><br/><br/>
                <li>
                    <div id="account"><a href="register.php" >Don't have an account? Register</a></div>
                </li>
                
            </ul>
            
        </form>
    </div>  <!-- Div class of Inner ends -->
    <!--<p class="forgotten"> Forgotten your <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a>?</p>-->
</div>  <!-- Div class of Widget ends -->