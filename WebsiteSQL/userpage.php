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
ob_start();
session_start();
function getBrowser(){

$agent = $_SERVER['HTTP_USER_AGENT'];
$name = 'NA';


if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {
    $name = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $agent)) {
    $name = 'Mozilla Firefox';
} elseif (preg_match('/Chrome/i', $agent)) {
    $name = 'Google Chrome';
} elseif (preg_match('/Safari/i', $agent)) {
    $name = 'Apple Safari';
} elseif (preg_match('/Opera/i', $agent)) {
    $name = 'Opera';
} elseif (preg_match('/Netscape/i', $agent)) {
    $name = 'Netscape';
}


return $name;
}

?>

<?php 
$id=$_SESSION['username'];
mysql_connect('localhost','root','');
mysql_select_db('mydatabase1');
$query="SELECT  `name` ,`fname`, `lname`, `age`, `dob`, `paddress`, `aaddress`, `pphone`, `aphone`, `email`, `gender`, `sch`, `gclg`, `pclg`, `sch10name`, `board10`, `per10`, `sch12name`, `board12`, `per12`, `collegename`, `collegeboard`, `collegeper`, `postcollegename`, `postcollegeboard`, `postcollegeper` FROM `users` WHERE `id`='".$id."'";
if ($queryrun=mysql_query($query))
{		$usid=mysql_result($queryrun,0,'name');
		$fname=mysql_result($queryrun,0,'fname');$lname=mysql_result($queryrun,0,'lname');
		$age=mysql_result($queryrun,0,'age');
		$dob=mysql_result($queryrun,0,'dob');$aaddress=mysql_result($queryrun,0,'aaddress');
		$paddress=mysql_result($queryrun,0,'paddress');$aphone=mysql_result($queryrun,0,'aphone');
		$pphone=mysql_result($queryrun,0,'pphone');
		$email=mysql_result($queryrun,0,'email');$gender=mysql_result($queryrun,0,'gender');
		$sch=mysql_result($queryrun,0,'sch');$gclg=mysql_result($queryrun,0,'gclg');$pclg=mysql_result($queryrun,0,'pclg');$sch10name=mysql_result($queryrun,0,'sch10name');$sch12name=mysql_result($queryrun,0,'sch12name');
		$board10=mysql_result($queryrun,0,'board10');$board12=mysql_result($queryrun,0,'board12');
		$per10=mysql_result($queryrun,0,'per10');$per12=mysql_result($queryrun,0,'per12');
		$collegename=mysql_result($queryrun,0,'collegename'); $collegeboard=mysql_result($queryrun,0,'collegeboard'); $collegeper=mysql_result($queryrun,0,'collegeper'); $postcollegeboard=mysql_result($queryrun,0,'postcollegeboard'); $postcollegename=mysql_result($queryrun,0,'postcollegename');$postcollegeper=mysql_result($queryrun,0,'postcollegeper');
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
					<li><a href="#" data-toggle="modal" data-target="#about">About</a></li>
					<li><a href="usernotices.php">Notices</a></li>
					<li><a href="updateresume.php">Update Resume</a></li>
					<li><a href="changepassword.php">Change Password</a></li>
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
			       <li><a href="deleteaccount.php">Delete Account</a></li>
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
			 </ul>
			 </div>
	</div>
</nav>
<!-- Modal about -->
<div id="about" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">About</h2>
      </div>
      <div class="modal-body">
        <p>This website provide's everyone a platform where they can help themselves getting recruit in big MNC's and other developing companies of their intrests. </p>
		<p>From this site your Resume will be directly uplaoded to database servers of MultiNational Companies.</p>
		<p>We're working 24-hours to make our service better and fast.</p>
		<p>For any Queries contact us at : <kbd> my_resume@myResume.info</kbd></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of modal About -->
</div><!-- end of conatiner fluid-->
<div id="wrapperlogin" >

<center><h1><?php 
if(isset($_SESSION['username']))
{echo 'Welcome! '.$usid;}
else { echo 'No User Logged In';}

?>
</h1> <hr>
<h3>Your Details<h3> 
	<table>
	<tr>
		<td>Name :</td>
		<td> <?php echo $fname.' '.$lname; ?></td>
	</tr>
	
	<tr>
		<td>Age :</td><td> <?php echo $age ; ?></td>
	</tr>
	
	<tr><td>D.O.B :</td><td> <?php echo $dob;?></td></tr>
	
	<tr><td>Gender :</td><td> <?php echo $gender;?></td></tr>
	
	<tr><th rowspan="2">Address :</th>
		<td> Permanent : <?php echo $paddress; ?></td></tr>
		<tr><td>Alternate : <?php echo $aaddress; ?></td></tr>
	
	
	<tr><th rowspan="2">Contact Number :</th>
	<td><?php echo $pphone;?></td></tr>
	<tr><td><?php echo $aphone;?></td></tr>
	
	<tr><th rowspan="7">School Details :</th><td>Stream :<?php echo $sch ;?></td> </tr>
			<tr><td>10th School Name :<?php  echo $sch10name ;?></td> </tr>
			<tr><td>Board:<?php  echo  $board10  ;?></td></tr>
			<tr><td>Percentage :<?php  echo $per10  ;?></td></tr>
			<tr><td>12th School Name :<?php  echo $sch12name ;?></td></tr>
			<tr><td>12th Board:<?php  echo $board12  ;?></td></tr>
			<tr><td>12th Percentage :<?php  echo $per12  ;?></td></tr>
	
	
	<tr><th rowspan="4">College Details :</th><td>Course :<?php echo $gclg; ?></td></tr>
	<tr><td>College Name : <?php echo $collegename; ?></td></tr>
	<tr><td>University/Board :<?php echo $collegeboard; ?></td></tr>
	<tr><td>Percentage : <?php echo $collegeper; ?></td></tr>
	
	
	<tr><th rowspan="4"> Post Graduate College Details :</th><td>Course :<?php echo $pclg; ?></td></tr>
	<tr><td>College Name : <?php echo $postcollegename; ?></td></tr>
	<tr><td>University/Board :<?php echo $postcollegeboard; ?></td></tr>
	<tr><td>Percentage : <?php echo $postcollegeper; ?></td></tr>
	</table>
<hr>

 <p>You're currently using <strong> <?php echo getBrowser(); ?> </strong></p>
</center>

</div>
</body>
</html>