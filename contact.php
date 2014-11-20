<?php require 'includes/config.php';?>
<?php $title = "Contact";?>
<?php include 'includes/header.php';?>
	<h1>Contact Us</h1>         
    <p>Why? Because we care.</p>
<?php
if(isset($_POST['first_name'])){//if there's data, show it.
	//echo $_POST['FirstName'];
	$message = process_post();
	
	safeEmail('bcleme04@seattlecentral.edu', 'test subject', $message);
	echo 'Thank you for your email!';
	
	}
else{//show the form
	echo '
	
	<form acton="contact.php" method="post">
	First Name:
	<br />
	<input type="text" name="first_name" required="required" />
	<br />
	Email:
	<br /> 
	<input type="email" name="email" required="required" placeholder="Enter Valid email"/>
	<br />
	Comments:
	<br /> 
	<textarea name="comments"></textarea>
	<br />
	<input type="submit" value="Submit" />
	</form>
	
	
	';
	}


?>
<?php include 'includes/footer.php';?>
