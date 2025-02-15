<div id="colorlib-main">
	<!-- Contact-->
	<div id="get-in-touch">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
					<h2>Contact Page!</h2>
				</div>
			</div>
		</div>
	</div>
	<?php
		session_start();
		if (!isset($_POST['submit']))
		{
			echo '<form method="post" action="" id="mainForm">';
			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "firstNameNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input type="text" id="firstname" placeholder="First Name" name="firstname" class="form-control"/>';
				echo '<div id="fnFeedback">First name cannot be blank!</div>';
				echo '</div>';
			}
			else if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "firstNameInvalid"))
			{
				echo '<div class="form-group has-error">';
				echo '<input type="text" id="firstname" placeholder="First Name" name="firstname" class="form-control"/>';
				echo '<div id="fnFeedback">First name cannot contain numbers or special characters!</div>';
				echo '</div>';
			}
			else // there is no error, check for previously submitted data
			{
				if (isset($_SESSION['firstname'])) // form loaded with previous data
				{ 
					echo '<div class="form-group has-success">';
					echo '<input type="text" id="firstname" placeholder="First Name" name="firstname" class="form-control" value="'.$_SESSION['firstname'].'"/>';
					echo '<div id="fnFeedback"></div>';
					echo '</div>';
				}
				else // form loaded for first time
				{
					echo '<div class="form-group">';
					echo '<input type="text" id="firstname" placeholder="First Name" name="firstname" class="form-control"/>';
					echo '<div id="fnFeedback"></div>';
					echo '</div>';
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "lastNameNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname"/>';
				echo '<div id="lnFeedback">Last name cannout be blank!</div>';
				echo '</div>';
			}
			else if (isset ($_GET['errMsg']) && strstr($_GET['errMsg'], "lastNameInvalid"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname"/>';
				echo '<div id="lnFeedback">Last name cannout contain numbers or special characters!</div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['lastname']))
				{
					echo '<div class="form-group has-success">';
					echo '<input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname" value="'.$_SESSION['lastname'].'"/>';
					echo '<div id="lnFeedback"></div>';
					echo '</div>';
				}
				else
				{
					echo '<div class="form-group">';
					echo '<input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname"/>';
					echo '<div id="lnFeedback"></div>';
					echo '</div>';
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "emailNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Email" name="email" id="email"/>';
				echo '<div id="emailFeedback">Email cannot be blank!</div>';
				echo '</div>';
			}
			else if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "emailInvalid"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Email" name="email" id="email"/>';
				echo '<div id="emailFeedback">Please provide a valid email format!</div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['email']))
				{
					echo '<div class="form-group has-success">';
					echo '<input class="form-control" type="text" placeholder="Email" name="email" id="email" value="'.$_SESSION['email'].'"/>';
					echo '<div id="emailFeedback"></div>';
					echo '</div>';
				}
				else
				{
					echo '<div class="form-group">';
					echo '<input class="form-control" type="text" placeholder="Email" name="email" id="email"/>';
					echo '<div id="emailFeedback"></div>';
					echo '</div>';
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "phoneNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Phone" name="phone" id="phone"/>';
				echo '<div id="phoneFeedback">Phone numbers cannot be blank!</div>';
				echo '</div>';
			}
			else if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "phoneInvalid"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Phone" name="phone" id="phone"/>';
				echo '<div id="phoneFeedback">Please use only numbers! ex. 123456789</div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['phone']))
				{
					echo '<div class="form-group has-success">';
					echo '<input class="form-control" type="text" placeholder="Phone" name="phone" id="phone" value="'.$_SESSION['phone'].'"/>';
					echo '<div id="phoneFeedback"></div>';
					echo '</div>';
				}
				else
				{
					echo '<div class="form-group">';
					echo '<input class="form-control" type="text" placeholder="Phone" name="phone" id="phone"/>';
					echo '<div id="phoneFeedback"></div>';
					echo '</div>';
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "usernameNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Username" name="username" id="username"/>';
				echo '<div id="unFeedback">Username cannot be blank!</div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['username']))
				{
					echo '<div class="form-group has-success">';
					echo '<input class="form-control" type="text" placeholder="Username" name="username" id="username" value="'.$_SESSION['username'].'"/>';
					echo '<div id="unFeedback"></div>';
					echo '</div>';	
				}
				else
				{
					echo '<div class="form-group">';
					echo '<input class="form-control" type="text" placeholder="Username" name="username" id="username"/>';
					echo '<div id="unFeedback"></div>';
					echo '</div>';
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "passwordNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<input class="form-control" type="text" placeholder="Password" name="password" id="password"/>';
				echo '<div id="pwFeedback">Password cannot be blank!</div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['password']))
				{
					echo '<div class="form-group has-success">';
					echo '<input class="form-control" type="text" placeholder="Password" name="password" id="password" value="'.$_SESSION['password'].'"/>';
					echo '<div id="pwFeedback"></div>';
					echo '</div>';	
				}
				else
				{
					echo '<div class="form-group">';
					echo '<input class="form-control" type="text" placeholder="Password" name="password" id="password"/>';
					echo '<div id="pwFeedback"></div>';
					echo '</div>';	
				}
			}

			if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "commentsNull"))
			{
				echo '<div class="form-group has-error">';
				echo '<textarea class="form-control" placeholder="Comments" rows="10" name="comments" id="comments"></textarea>';
				echo '<div id="commentsFeedback"></div>';
				echo '</div>';
			}
			else
			{
				if (isset($_SESSION['comments']))
				{
					echo '<div class="form-group has-success">';
					echo '<textarea class="form-control" placeholder="Comments" rows="10" name="comments" id="comments"></textarea>';
					echo '<div id="commentsFeedback"></div>';
					echo '</div>';	
				}
				else
				{
					echo '<div class="form-group">';
					echo '<textarea class="form-control" placeholder="Comments" rows="10" name="comments" id="comments"></textarea>';
					echo '<div id="commentsFeedback"></div>';
					echo '</div>';
				}
			}
			echo '<div class="form-group">';
			echo '<input type="submit" value="Submit" name="submit" />';
			echo '</div>';
			echo '</form>';
		}
		else
		{
			$errors=""; // clear out all previous errors
			$_SESSION=array(); //clear out all session data
			$firstName=$_POST['firstname'];
			if ($firstName==NULL) // Will have an error
				$errors="firstNameNull";
			else if (!preg_match('/^[a-zA-Z\'-]+$/', $firstName))
				$errors="firstNameInvalid";
			else // No error and save submitted data
				$_SESSION['firstname']=$firstName;

			$lastName=$_POST['lastname'];
			if ($lastName==NULL)
				$errors.="lastNameNull";
			else if (!preg_match('/^[a-zA-Z\'-]+$/', $lastName))
				$errors.="lastNameInvalid";
			else
				$_SESSION['lastname']=$lastName;

			$email=$_POST['email'];
			if ($email==NULL)
				$errors.="emailNull";
			else if (!preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email))
				$errors.="emailInvalid";
			else
				$_SESSION['email']=$email;

			$phone=$_POST['phone'];
			if ($phone==NULL)
				$errors.="phoneNull";
			else if (!preg_match('/^[0-9]+$/', $phone))
				$errors.="phoneInvalid";
			else
				$_SESSION['phone']=$phone;

			$username=$_POST['username'];
			if ($username==NULL)
				$errors.="usernameNull";
			else
				$_SESSION['username']=$username;

			$password=$_POST['password'];
			if ($password==NULL)
				$errors.="passwordNull";
			else
				$_SESSION['password']=$password;

			$comments=$_POST['comments'];
			if ($comments==NULL)
				$error.="commentsNull";
			else
				$_SESSION['comments']=$comments;

			if($errors!=NULL)
				redirect("index.php?page=contact&errMsg=$errors");
			
			//ODBC string
			$dblink=db_connect("contact_data");
			$sql="Insert into `contact_info` (`first_name`, `last_name`, `email`, `phone`, `user_name`, `password`, `comments`) values ('$firstName', '$lastName', '$email', '$phone', '$username', '$password', '$comments')";
			$dblink->query($sql) or
				die("Something went wrong with: $sql".$dblink->error);
			echo '<h2>Your data was successfully saved.</h2>';
		}
	?>

</div>
<script src="assets/js/event-attributes.js"></script>

