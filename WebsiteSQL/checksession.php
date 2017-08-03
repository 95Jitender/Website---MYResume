<?php
ob_start();
session_start();
 if(!isset($_SESSION['username']) && empty($_SESSION['username']))
 {
	  header('Location: login.php');
 } 
 else {
	 header('Location: userpage.php');
 }

?>