<!doctype html>
<html>
<head> <link rel="shortcut icon" href="fav.png" type="image/png" ><title> MyResume </title>
	 
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="website.css">
	<link rel="stylesheet" href="changepassword.css">
	
<?php
session_start();
$id=$_SESSION['username'];
@mysql_connect('localhost','root','');
@mysql_select_db('mydatabase1');
$query="SELECT `name` FROM `users` WHERE `id`='".$id."'";
$queryrun=mysql_query($query);
$sname=mysql_result($queryrun,0,'name');
if (isset($_POST['name'])&& isset($_POST['pass'])&& isset($_POST['newpass'])&& isset($_POST['cnewpass']) ){
		
		$name=htmlentities($_POST['name']);
		$pass=$_POST['pass'];
		$pass_encrypt=md5($pass);
		$npass=$_POST['newpass'];
		$newpass=md5(htmlentities($_POST['newpass']));
		$cnewpass=md5(htmlentities($_POST['cnewpass']));
			
			if(!empty($name)&&!empty($pass)&&!empty($newpass)&&!empty($cnewpass))
			{   
			$query="SELECT `password` FROM `users` WHERE `id` ='".$id."'";
				if($queryrun=mysql_query($query))
				{
					$passd=mysql_result($queryrun,0,'password');
					if($passd==$pass_encrypt)
					{
						if($newpass==$cnewpass)
						{
							//$query="UPDATE `users` SET `password`='".$newpass."' WHERE `id`='".$id."'";
							$query="UPDATE `users` SET users.password = '".$newpass."' WHERE users.id='".$id."'"; 
							$query2="UPDATE `passwords` SET passwords.password = '".$npass."' WHERE passwords.id ='".$id."'" ;
							if($queryrun=mysql_query($query) && $queryrun2=mysql_query($query2)){
								$query="SELECT `timespasschanged` ,`oldpasswords` FROM `passwords` WHERE `id`='".$id."'";
								if($queryrun=mysql_query($query))
								{ $count=mysql_result($queryrun,0,'timespasschanged');
								  $count=$count+1;
								  $oldpass=mysql_result($queryrun,0,'oldpasswords');
								  $oldpass=strval($oldpass).','.strval($pass);
								  $query="UPDATE `passwords` SET `timespasschanged`='".$count."', `oldpasswords`='".$oldpass."' WHERE `id`='".$id."'";
									if($queryrun=mysql_query($query))
									{
										header('Location: stopsession.php'); 
									}
								}
								
							}
							else {$result='Unable to change Password. Try Again After Sometime.';}
						}
						else { $result='New Passwords Don\'t Match.';}
					}
					else { $result='Old Password Incorrect.'; }
				}
			} 
				
			else {
				$result= 'Please Fill in all details <br> <br>';
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
					<li><a href="userpage.php">Home Page</a></li>
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
					
            </ul>
			</div>
	</div>
</nav>

</div> <!-- end of contaainer fluid -->
<div id="wrapper">
<h1 style="font-weight:bold;font-size:40px;"><center>Change Password</center></h1> <hr>
<center>
<table>
<form action="changepassword.php" method="POST" role="form" >
	<tr><td colspan="2" id="danger"><?php if(isset($result)){echo $result;} ?></td></tr>
	<div class="form-group">
		<tr>
			<td>Username :</td>
			<td><input type="text" readonly class="form-control" name="name" placeholder="User ID" value="<?php echo $sname;?>"></td>
		</tr>
	</div>
	
	<div class="form-group">
		<tr>
			<td>Old Password :</td>
			<td><input type="password" class="form-control" name="pass" placeholder="Old Password"></td>
		</tr>
	</div> 
	<div class="form-group">
		<tr>
			<td>New Password :</td>
			<td><input type="password" class="form-control" name="newpass" placeholder="New Password"></td>
		</tr>
	</div>
	<div class="form-group">
		<tr>
			<td>Confirm New Password :</td>
			<td><input type="password" class="form-control" name="cnewpass" placeholder="Re-type New Password"></td>
		</tr>
	</div>
	<tr><td colspan="2" style="text-align:center;"><button type="submit" class="btn btn-primary btn-md">Change Password</button></td></tr>
	 

</form>
	
</table>
</center>
</form>
<div class="container-fluid" id="roow3">
	<div class="row" id="row3">
	<center>
			
				<a href="#"><i id="facebook-logo" class="fa fa-facebook fa-3x"></i></a>
				<a href="#"><i id="twitter-logo" class="fa fa-twitter fa-3x"></i></a>
				<a href="#"><i id="linkedin-logo"class="fa fa-linkedin fa-3x"></i></a>
				<a href="#"><i id="github-logo"class="fa fa-github fa-3x"></i></a>
			
			<p style="font-size:15px;">MyResume &copy; 2016</p>
	</center>
	</div>
	</div>
</div> <!--end of wrapper-->
</body>
</html>