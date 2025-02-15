<?php



function db_connect($db)
{
	$dbUserName="webuser";
	$dbPassword="KHzGIxwP3A2.@[Fy";
	$host="localhost";
	$dblink=new mysqli($host, $dbUserName, $dbPassword, $db);
	return $dblink;
}

function redirect ( $uri )
{ ?>
	<script type="text/javascript">
	document.location.href="<?php echo $uri; ?>";
	</script>
<?php die;
}
?>