<!doctype html>
<html>
<head><link rel="shortcut icon" href="fav.png" type="image/png"> <title> MyResume </title>
	 
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="website.css">
	<style>
	#roow3 { padding-left:50px;
	padding-top:205px;}
	td{
		padding:10px;
		width:40px;
	}
	</style>
	
<?php
$id=$_GET['id'];
$result='';
mysql_connect('localhost','root','');
mysql_select_db('mydatabase1');
if(isset($_POST['submit'])) {
$query="DELETE FROM `notices` WHERE `id`='".$id."'";
if($queryrun=mysql_query($query))
{
	header('Location: adminpage.php');
}
else {
	$result='Unable to Delete Account';
}
}
?>

</head>
<body>
<div class="conatiner-fluid">
<nav  class="navbar navbar-fixed-top navbar-default" id="navB">
	<div class="conatiner-fluid">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
				<span class="icon-bar"></span>
            </button>
		<div class="navbar-header" id="navBH">
		<a href="#" class="navbar-brand"> MyResume </a>
		</div> <!-- end of navbar header -->
		<div class="collapse navbar-collapse" id="mainNavBar">
			<ul class="nav navbar-nav" id="navUL">
					<li><a href="adminpage.php">Home Page</a></li>
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
					
            </ul>
			</div>
	</div>
</nav>

</div> <!-- end of contaainer fluid -->
<div id="wrapper">
<h1 style="font-weight:bold;font-size:40px;"><center> Delete Notice</center></h1> <hr>
	<center><h3>Are You Sure.? You Want Do Delete This Notice.</h3>
	</center>
<center>
<table>
<form action="admindeletenotices.php?id=<?php echo $id;?>" method="POST" role="form" >
	<tr><td colspan="2" id="danger"><?php echo $result; ?></td></tr>
	<tr><td><button type="button" onclick="window.location.assign('adminpage.php')" class="btn btn-success btn-block">No</button></td>
	<td></td>
	<td><button type="submit" name="submit" class="btn btn-danger btn-block">Yes</button></td></tr>
	 

</form>
	
</table>
</center>
</form>
</div> <!--end of wrapper-->
</body>
</html>