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
$redloc='userpage.php';
$ename='';
$result='';
if(isset($_POST['name'])&&isset($_POST['pass'])) 
{
  $ename=$_POST['name'];
  $epass=md5($_POST['pass']);
  $epassadmin=$_POST['pass'];
  
  if(!empty($ename) && !empty($epass)) 
    {
		if($ename=='admin' && $epassadmin=='admin123'){
			header('Location: loginadmin.php');
		}
		else {
		mysql_connect('localhost','root','') or die('Could not connect');
		mysql_select_db('mydatabase1') or die('Could not connect to database');
		$query="SELECT `id` FROM `users` WHERE `name`='".$ename."' AND `password`='".$epass."'";
		
		if($q=mysql_query($query))
		{
				 $row =mysql_num_rows($q);
				 if($row==1)
				 {		 
						 $id=mysql_result($q,0,'id');
					     session_start();
						 $_SESSION['username']=$id;
						 header('Location: '.$redloc);
						if(isset($_SESSION['username'])&& !empty($_SESSION['username']))
							{
							$query="SELECT `logintimes` FROM `passwords` WHERE `id`='".$id."'";
								if($queryrun=mysql_query($query)){
									$counter=mysql_result($queryrun,0,'logintimes');
									$counter=$counter+1;
									$time=time();
									date_default_timezone_set('Asia/Calcutta');
									$date=date('d M Y',$time);
									$time_actual=date('h:i A',$time);										
									$query="UPDATE `passwords` SET `logintimes`='".$counter."' ,`lastlogindate`='".$date."' , `lastlogintime`='".$time_actual."' WHERE `id`='".$id."'";
									if($queryrun=mysql_query($query))
									{
										true;
									}else{
										die;
									}
								}
							}
				 }
				 else {$result="Wrong ID/Password. Try Again! " ;}
		 } 
		  else {$result= 'Query Failed';}
		}
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
					<li><a href="#" data-toggle="modal" data-target="#about">About</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Reg">How To Register?</a></li>
					<li></li>
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
					<li><a href="registeration.php">Register?</a></li>
					
					
            </ul>
			</div>
	</div>
</nav>
<!-- Modal Register -->
<div id="Reg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">How To Register ?</h2>
      </div>
      <div class="modal-body">
        <p>Click On the <strong><a href="registeration.php">Register</a></strong> link.</p>
		<p>The link will take you to the registeration page</p>
		<p>Fill in the registeration form will correct details. If any information is founded fake your account will be blocked. </p>
		<p>Do Uploads all the required documents to complete the registeration process</p>
		<hr>
		<h4><b>After Registeration</b> </h4>
		<hr>
		<p>Once Registered, our system will verify all your documents and details and revert back to you in 24 hours.</p>
		<p>After your information is validated and found correct you can fill the your resume online. </p>
		<p>Your resume will then be uploaded on our servers which is connected to a lot of companies database. </p>
		<p>You can later Update your resume along with other documents and proof's</p>
		<hr>
		<h4> <b>Terms And Conditions</h4></b>
		<hr>
		<p>One user should not have more than one account.</p>
		<p>Documents and proofs uploaded should match the requirements described in Description</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <!-- end of modal register -->

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

<center>
<h1>Enter Login Details</h1> <hr>
 <table>
<form action="login.php" method="POST" role="form" >
	<tr><td colspan="2" id="danger"><?php echo $result; ?></td></tr>
	<div class="form-group"><tr><td>Username :</td><td><input type="text" class="form-control" name="name" placeholder="User ID" value="<?php echo $ename;?>"></td></tr></div>
	<div class="form-group"><tr><td>Password :</td><td><input type="password" class="form-control" name="pass" placeholder="Password"></td></tr></div>
	<tr><td><button type="submit" class="btn btn-primary btn-md">Login</button></td></tr>
	 

</form>
	
</table>

</center>
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

</body>
</html>