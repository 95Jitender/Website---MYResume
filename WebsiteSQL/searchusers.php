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
	<link rel="stylesheet" href="searchusers.css">
	<link rel="stylesheet" href="website.css">
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
					<li><button type="button" class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
			 </ul>
			 </div>
	</div>
</nav>
</div>
<div id="wrapperlogin" >
<center>
<form role="form" class="form-inline" action="searchusers.php" method="POST">
<h1>Search</h1>
<div class="form-group"> <input type="text"  class="form-control" style="width:800px;" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name']; }?>"> </div>
<button type="submit" class="btn btn-primary">Search</button> 
</form>
<div id="results">
<table>
<tr>
<th>Account-ID</th>
<th>Username</th>
<th>Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
$ename='';
if(isset($_POST['name'])&&!empty($_POST['name'])) 
{ $ename=$_POST['name'];
	 if(!empty($ename)){
		$host='localhost';
		$user='root';
		$pass='';
		$db='mydatabase1';
		mysql_connect($host,$user,$pass) or die('Could not connect');
		mysql_select_db($db) or die('Could not connect to database');
		$query="SELECT users.id,users.name,users.fname,users.lname,users.gender,users.email,users.pphone,passwords.password FROM `users` RIGHT JOIN `passwords` ON users.id=passwords.id WHERE users.name LIKE '%".$ename."%'";
			if($q=mysql_query($query)){
			 $count =mysql_num_rows($q);
						while($row = mysql_fetch_assoc($q) ) {
						 $password=$row['password'];
						 $username=  $row['name'];
						 $userid= $row['id'];
						 $firstname= $row['fname'];
						 $lastname=$row['lname'];
						 $gender=$row['gender'];
						 $email=$row['email'];
						 $pphone=$row['pphone'];
						echo '<tr><td>'.$userid.'</td><td><a href="viewuserdetails.php?id='.$userid.'">'.$username.'</td><td>'.$firstname.' '.$lastname.'</td><td><a href="adminupdatedata.php?id='.$userid.'">Edit</a></td><td><a href="admindeletedata.php?id='.$userid.'">Delete</a></td></tr>';
							}
				} 
					else {echo 'Query Failed';}
		    }
}

	
?>

</table>
</center>
</div>
</div>
</body>
</html>

