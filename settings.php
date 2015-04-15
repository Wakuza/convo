<?php
    $title = "Convo Portal | Settings";
	include("core/init.php");
	protect_page();
	include("includes/overall/header.php");

	if(empty($_POST) === false) {
		$required_fields = array("firstname", "lastname", "email");
		foreach($_POST as $key => $value) {
			if(empty ($value) && in_array($key, $required_fields) === true) {
				$errors[] = "Fields marked with an asterik are required";  
				break 1;
			}
		}
		/*if(empty($errors) === true) {
			if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = "A valid email address is required";
			}
			else if(email_exists($_POST["email"]) === true && $user_data["email"] !== $_POST["email"]) {
				$errors[] = "Sorry, the email \"" . $_POST["email"] . "\" is already in use";
			}
		}*/
	}

    $displayNone = "";

?>


<?php
	if(isset($_GET["success"]) === true && empty($_GET["success"]) === true) {
		echo "Your detials have been updated!";
	}
	else {
		if(empty($_POST) === false && empty($errors) === true) {
			// Update user details
			$update_data = array(
				"firstname"	=> $_POST["firstname"],
				"lastname"	=> $_POST["lastname"],
				//"email"		=> $_POST["email"]
			);

			update_user($session_user_id, $update_data);
            $displayNone = "style='display: none'";
			//header("Location: settings.php?success");
            echo "<p class='headerPages'>Your information has been updated successfully</p>";
			exit();
			
		}
		else if(empty($errors) === false) {
			echo output_errors($errors);
		}
?>
<h1 class="headerPages" <?php echo $displayNone; ?>>Settings</h1>

	<form action="" method="post">
        <span class="spanHeader">First Name: </span>
        <input type="text" name="firstname" value="<?php echo $user_data["firstname"]; ?>"><br/>
        
        <span class="spanHeader">Last Name: </span>
        <input type="text" name="lastname" value="<?php echo $user_data["lastname"]; ?>"><br/>
        
        <input id="updateButton" class="btn-success" type="submit" value="Update">
	</form>


	<?php
}
	include("includes/overall/footer.php");
?>