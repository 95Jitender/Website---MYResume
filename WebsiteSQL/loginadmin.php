<html>
<head>
<link rel="shortcut icon" href="fav.png" type="image/png"><title>Login</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="website.css">

<?php
$redloc='adminpage.php';
$ename='';
$result='';
if(isset($_POST['name'])&&isset($_POST['pass'])) 
{ 
  $ename=$_POST['name'];
  $epass=$_POST['pass'];
 
  if(!empty($ename) && !empty($epass)) 
    {
		
				mysql_connect('localhost','root','') or die('Could not connect');
				mysql_select_db('mydatabase1') or die('Could not connect to database');
				$query="SELECT `id` FROM `admin` WHERE `username`='".$ename."' AND `password`='".$epass."'";
				
				if($q=mysql_query($query))
				{
						 $row =mysql_num_rows($q);
						 if($row==1)
						 {		 
								 $id=mysql_result($q,0,'id');
								 session_start();
								 $_SESSION['username']=$id;
								 header('Location: '.$redloc); 
						 }
						 else {$result="Wrong ID/Password. Try Again! " ;}
				 } 
				  else {$result= 'Query Failed';}
		}
	
	else {$result= 'Fill in All Details';}

}

?>

</head>
<body>
<div class="conatiner-fluid">
<nav  class="navbar navbar-default" id="navB">
	<div class="conatiner-fluid">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
				<span class="icon-bar"></span>
            </button>
		<div class="navbar-header" id="navBH">
		<a href="index.php" class="navbar-brand"> MyResume </a>
		</div> <!-- end of navbar header -->
		<div class="collapse navbar-collapse" id="mainNavBar">
			<ul class="nav navbar-nav" id="navUL">
					<li><a href="index.php">Home</a></li>
			</ul>
			</div>
	</div>
</nav>
</div>

<center>
<h1>Admin Login</h1> <hr>
 <table>
<form action="loginadmin.php" method="POST" role="form" >
	<tr><td colspan="2" id="danger"><?php echo $result; ?></td></tr>
	<div class="form-group"><tr><td>Username :</td><td><input type="text" class="form-control" name="name" placeholder="User ID" value="<?php echo $ename;?>"></td></tr></div>
	<div class="form-group"><tr><td>Password :</td><td><input type="password" class="form-control" name="pass" placeholder="Password"></td></tr></div>
	<tr><td><button type="submit" class="btn btn-primary btn-md">Login</button></td></tr>
	 

</form>
	
</table>

</center>
	

</body>
</html>