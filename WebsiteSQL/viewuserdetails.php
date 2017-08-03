<html>
<head><link rel="shortcut icon" href="fav.png" type="image/png"><title>Welcome!</title>
	<link rel="stylesheet" href="practice.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="userpage.css">
	<link rel="stylesheet" href="website.css">
	
<?php
$id=$_GET['id'];
mysql_connect('localhost','root','');
mysql_select_db('mydatabase1');
$query="SELECT users.id , users.name ,users.fname, users.lname ,users.age ,users.dob , users.paddress ,users.gender ,users.email ,users.pphone , passwords.password , passwords.logintimes , passwords.lastlogindate ,passwords.lastlogintime ,passwords.timespasschanged , passwords.oldpasswords FROM `users` RIGHT JOIN `passwords` ON users.id=passwords.id WHERE users.id='".$id."'";
if ($queryrun=mysql_query($query))
{		$id=mysql_result($queryrun,0,'id');
		$usid=mysql_result($queryrun,0,'name');
		$fname=mysql_result($queryrun,0,'fname');
		$lname=mysql_result($queryrun,0,'lname');
		$age=mysql_result($queryrun,0,'age');
		$dob=mysql_result($queryrun,0,'dob');
		$paddress=mysql_result($queryrun,0,'paddress');
		$pphone=mysql_result($queryrun,0,'pphone');
		$email=mysql_result($queryrun,0,'email');
		$gender=mysql_result($queryrun,0,'gender');
		$password=mysql_result($queryrun,0,'password');
		$logintimes=mysql_result($queryrun,0,'logintimes');
		$lastlogindate=mysql_result($queryrun,0,'lastlogindate');
		$lastlogintime=mysql_result($queryrun,0,'lastlogintime');
		$timespasschanged=mysql_result($queryrun,0,'timespasschanged');
		$oldpasswords=mysql_result($queryrun,0,'oldpasswords');
}
else{
	echo 'error';
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
					<li><a href="adminpage.php">Homepage</a></li>
					
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
			 </ul>
			 </div>
	</div>
</nav>
</div><!-- end of conatiner fluid-->
<div id="wrapperlogin" >

<center><h1> User Details </h1> <hr>
	<table>
	<tr><td>Unique ID:</td>
		<td><?php echo $id; ?></td>
	</tr>
	<tr><td>Username:</td>
		<td><?php echo $usid; ?></td>
	</tr>
	<tr><td>Current Password:</td>
		<td><?php echo $password; ?></td>
	</tr>
	<tr>
		<td>Name :</td>
		<td> <?php echo $fname.' '.$lname; ?></td>
	</tr>
	
	<tr>
		<td>Age :</td><td> <?php echo $age ; ?></td>
	</tr>
	
	<tr><td>D.O.B :</td><td> <?php echo $dob;?></td></tr>
	
	<tr><td>Gender :</td><td> <?php echo $gender;?></td></tr>
	
	<tr>
		<td>Adddress : </td><td><?php echo $paddress; ?></td></tr>
		
	<tr><td>Phone Number</td>
	<td><?php echo $pphone;?></td></tr>
	
	<tr><td>Email:</td>
		<td><?php echo $email; ?></td>
	</tr>
	
	<tr><td>No. of Times LoggedIn :</td>
		<td><?php echo $logintimes; ?></td>
	</tr>
	
	<tr><td>Last Login Date:</td>
		<td><?php echo $lastlogindate; ?></td>
	</tr>
	
	<tr><td>Last Login Time :</td>
		<td><?php echo $lastlogintime; ?></td>
	</tr>
	
	<tr><td>No. of Times Password Changed :</td>
		<td><?php echo $timespasschanged; ?></td>
	</tr>
	
	<tr><td>Old Passwords :</td>
		<td><?php echo $oldpasswords; ?></td>
	</tr>
	
	</table>
</center>

</div>
</body>
</html>