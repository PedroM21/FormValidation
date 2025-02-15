<?php
echo '<nav id="colorlib-main-menu" role="navigation">';
echo '<ul>';

if (!isset($_GET['page']))
	$page="home";
else
	$page=$_GET['page'];

if ($page=="home")
	echo '<li class="colorlib-active"><a href="index.php?page=home">Home</a></li>';
else 
	echo '<li><a href="index.php?page=home">Home</a></li>';
if ($page=="hobbies")
	echo '<li class="colorlib-active"><a href="index.php?page=hobbies">Hobbies</a></li>';
else
	echo '<li><a href="index.php?page=hobbies">Hobbies</a></li>';
if ($page=="work")
	echo '<li class="colorlib-active"><a href="index.php?page=work">Work</a></li>';
else
	echo '<li><a href="index.php?page=work">Work</a></li>';
if ($page=="school")
	echo '<li class="colorlib-active"><a href="index.php?page=school">School</a></li>';
else
	echo '<li><a href="index.php?page=school">School</a></li>';
if ($page=="contact")
	echo '<li class="colorlib-active"><a href="index.php?page=contact">Contact</a></li>';
else
	echo '<li><a href="index.php?page=contact">Contact</a></li>';
if ($page=="results")
	echo '<li class="colorlib-active"><a href="index.php?page=results">Results</a></li>';
else
	echo '<li><a href="index.php?page=results">Results</a></li>';
if($page=="register")
	echo '<li class="colorlib-active"><a href="index.php?page=register">Register</a></li>';
else
	echo '<li><a href="index.php?page=register">Register</a></li>';
if($page=="login")
	echo '<li class="colorlib-active"><a href="index.php?page=login">Login</a></li>';
else
	echo '<li><a href="index.php?page=login">Login</a></li>';
echo '</ul>';
echo '</nav>';
?>