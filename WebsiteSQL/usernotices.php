<html>
<head><link rel="shortcut icon" href="fav.png" type="image/png"><title>Welcome!</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="viewnotices.css">
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
					<li><a href="userpage.php">Home Page</a></li>
					<li><a href="usersearchnotices.php">Search Notices</a></li>
				
			</ul>
		
			<ul class="nav navbar-nav navbar-right" id="navBR">
			  
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
			 </ul>
			 </div>
	</div>
</nav>
</div>
<div id="wrapperlogin" >
<center>
<h1>Notices</h1>
<div id="result">
<table>
<tr>
<th>Date</th>
<th>Title</th>
<th>From</th>
<th>Message</th>
</tr>
<?php
		$host='localhost';
		$user='root';
		$pass='';
		$db='mydatabase1';
		mysql_connect($host,$user,$pass) or die('Could not connect');
		mysql_select_db($db) or die('Could not connect to database');
		$query="SELECT `id`,`date`,`title`,`frm`,`message` FROM `notices` ORDER BY `id` DESC";
			if($q=mysql_query($query)){
				$count =mysql_num_rows($q);
						while($row = mysql_fetch_assoc($q)) {
						 $id=$row['id'];
						 $date=$row['date'];
						 $title=  $row['title'];
						 $frm= $row['frm'];
						 $message= $row['message'];
						 
						echo '<tr><td>'.$date.'</td><td>'.$title.'</td><td>'.$frm.'</td><td>'.$message.'</td></tr>';
					
							}
				} 
					else {echo 'Query Failed';}
		    


	
?>
</table>
</div>

</div>
</body>
</html>