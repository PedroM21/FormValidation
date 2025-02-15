<?php
// validate
echo '<div id="colorlib-main">';
echo '<h2>Register: Please fill out the form below.</h2>';
session_start();
if (!isset($_POST['submit']))
{
	echo '<form method="post" action="">';
	if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "usernameNull"))
	{
		echo '<div class="form-group has-error">';
		echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control"/>';
		echo '<div id="unFeedback">Username cannot be blank!</div>';
		echo '</div>';
	}
	else if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "accountExists"))
	{
		echo '<div class="form-group has-error">';
		echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control"/>';
		echo '<div id="unFeedback">Username already exists!</div>';
		echo '</div>';
	}
	else // there is no error, check for previously submitted data
	{
		if (isset($_SESSION['username'])) // form loaded with previous data
		{ 
			echo '<div class="form-group has-success">';
			echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control" value="'.$_SESSION['username'].'"/>';
			echo '<div id="unFeedback"></div>';
			echo '</div>';
		}
		else // form loaded for first time
		{
			echo '<div class="form-group">';
			echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control"/>';
			echo '<div id="unFeedback"></div>';
			echo '</div>';
		}
	}
	if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "passwordNull"))
	{
		echo '<div class="form-group has-error">';
		echo '<input type="password" id="password" placeholder="Password" name="password" class="form-control"/>';
		echo '<div id="pwFeedback">Password cannot be blank!</div>';
		echo '</div>';
	}
	else // there is no error, check for previously submitted data
	{
		if (isset($_SESSION['password'])) // form loaded with previous data
		{ 
			echo '<div class="form-group has-success">';
			echo '<input type="password" id="password" placeholder="Password" name="password" class="form-control" value="'.$_SESSION['password'].'"/>';
			echo '<div id="pwFeedback"></div>';
			echo '</div>';
		}
		else // form loaded for first time
		{
			echo '<div class="form-group">';
			echo '<input type="password" id="password" placeholder="Password" name="password" class="form-control"/>';
			echo '<div id="pwFeedback"></div>';
			echo '</div>';
		}
	}
	echo '<button class="btn btn-primary" name="submit" value="submit">Submit</button>';
	echo '</form>';
	/*
	echo '<div class="form-group">';
	echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control"/>';
	echo '<div id="unFeedback"></div>';
	echo '<div class="form-group">';
	echo '<input type="password" id="password" placeholder="Password" name="password" class="form-control"/>';
	echo '<div id="pwFeedback"></div>';
	echo '</div>';
	echo '<button class="btn btn-primary" name="submit" value="submit">Submit</button>';
	echo '</form>';*/
}
else
{
	$username=addslashes($_POST['username']);
	$passText=$_POST['password'];
	$salt="CS4413SP24-01";
	$password=hash('sha256',$salt.$passText.$username);
	$dblink=db_connect("user_data");
	$sql="Select `auto_id` from `accounts` where `username`='$username'";
	$result=$dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error);
	if($result->num_rows>0)
		redirect("index.php?page=register&errMsg=accountExists");
	else
	{
		$sql="Insert into `accounts` (`username`,`auth_hash`) values ('$username','$password')";
		$dblink->query($sql) or
			die("<p>Something went wrong with $sql<br>".$dblink->error);
		redirect("index.php?page=login");
	}
	
	$errors=""; // clear out all previous errors
	$_SESSION=array(); //clear out all session data
	$username=$_POST['username'];
	if ($username==NULL)
		$errors="usernameNull";
	else if ($username==$username)
		$errors.="accountExists";
	else
		$_SESSION['username']=$username;

	$password=$_POST['password'];
	if ($passText==NULL)
		$errors.="passwordNull";
	else
		$_SESSION['password']=$passText;
	
	if($errors!=NULL)
		redirect("index.php?page=register&errMsg=$errors");
}

echo '</div>';
?>
<script src="assets/js/event-attributes.js"></script>