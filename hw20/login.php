<?php
// validate
echo '<div id="colorlib-main">';
echo '<h2>Login: Please log in below.</h2>';
session_start();
if (!isset($_POST['submit']))
{
	echo '<form method="post" action="">';
	if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "invalidAuth"))
	{
		echo '<div class="form-group has-error">';
		echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control"/>';
		echo '<div id="unFeedback">Invalid User Account!</div>';
		echo '</div>';
	}
	else // there is no error, check for previously submitted data
	{
		if (isset($_SESSION['username'])) // form loaded with previous data
		{ 
			echo '<div class="form-group has-success">';
			echo '<input type="text" id="username" placeholder="Username" name="username" class="form-control" value="'.$_SESSION['username'].'"/>';
			echo '<div id="fnFeedback"></div>';
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
	echo '<div class="form-group">';
	echo '<input type="password" id="password" placeholder="Password" name="password" class="form-control"/>';
	echo '<div id="pwFeedback"></div>';
	echo '</div>';
	echo '<button class="btn btn-primary" name="submit" value="submit">Submit</button>';
	echo '</form>';
}
if(isset($_POST['submit']))
{
	$username=addslashes($_POST['username']);
	$passText=$_POST['password'];
	$salt="CS4413SP24-01";
	$password=hash('sha256',$salt.$passText.$username);
	$dblink=db_connect("user_data");
	$sql="Select `auto_id` from `accounts` where `auth_hash`='$password'";
	$result=$dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error);
	if($result->num_rows<=0)
		redirect("index.php?page=login&errMsg=invalidAuth");
	else
	{
		$salt=microtime();
		$sid=hash('sha256',$salt.$password);
		$sql="Update `accounts` set `session_id`='$sid' where `auth_hash`='$password'";
		$dblink->query($sql) or
			die("<p>Something went wrong with $sql<br>".$dblink->error);
		redirect("index.php?page=results&sid=$sid");
	}
	
	$errors=""; // clear out all previous errors
	$_SESSION=array(); //clear out all session data
	$username=$_POST['username'];
	if ($username!=$username)
		$errors="invalidAuth";
	else
		$_SESSION['username']=$username;	
	if($errors!=NULL)
		redirect("index.php?page=login&errMsg=$errors");
}
echo '</div>';

?>