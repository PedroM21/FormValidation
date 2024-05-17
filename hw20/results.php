<script src="assets/js/jquery-3.5.1.js"></script>
<?php
session_start();
if (!isset($_REQUEST['sid']) && $_REQUEST['sid']!='')
{
	echo '<div id="colorlib-main">';
	if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "invalidAuth"))
	{
		echo '<p>Invalid Session ID</p>';
		echo '<table class="table table-striped">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>First Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Email</th>';
		echo '<th>Phone</th>';
		echo '<th>Comments</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody id="results">';
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
	}
}
else if (isset($_REQUEST['sid']) && $_REQUEST['sid']!='')
{
	$sid=addslashes($_REQUEST['sid']);
	$dblink=db_connect("user_data");
	$sql="Select `auto_id` from `accounts` where `session_id`='$sid'";
	$result=$dblink->query($sql) or
		die("<p>Something went wrong with: $sql<br>".$dblink->error);
	if($result->num_rows<=0)
		redirect("index.php?page=login&errMsg=InvalidSid");
	echo '<div id="colorlib-main">';
	echo '<table class="table table-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>First Name</th>';
	echo '<th>Last Name</th>';
	echo '<th>Email</th>';
	echo '<th>Phone</th>';
	echo '<th>Comments</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody id="results">';
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
}
else
{
	$errors=""; // clear out all previous errors
	$_SESSION=array(); //clear out all session data
	$sid=$_POST['sid'];
	if ($sid!=$sid)
		$errors="InvalidSid";
	else
		$_SESSION['sid']=$sid;		
	redirect("index.php?page=login&errMsg=InvalidSid");
}
?>
<script>
	function refresh_data() {
		$.ajax({
			type: 'post',
			url: 'https://ec2-18-224-212-171.us-east-2.compute.amazonaws.com/hw19/query_contacts.php',
			success: function(data) {
				$('#results').html(data);
			}
		});
	}
setInterval(function(){ refresh_data(); }, 500);
</script>