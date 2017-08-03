<!doctype html>
<html>
<head> <link rel="shortcut icon" href="fav.png" type="image/png"> <title> MyResume </title>
	 <style> 
   #wrapperreg {padding-top:40px;
	padding-bottom:20px;
	
}
	 </style>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="website.css">
	
	<script>
	function red(){
	   setTimeout(function loc(){ window.location="login.php";},5000); 
	   }
	</script>
</head>
<body onload="red()">
<div class="conatiner-fluid">
<nav  class="navbar navbar-fixed-top" id="navB">
	<div class="conatiner-fluid">
		<div class="navbar-header" id="navBH">
		<a href="index.php" class="navbar-brand"> MyResume </a>
		</div> <!-- end of navbar header -->
			<ul class="nav navbar-nav" id="navUL">
					<li><a href="index.php">Home</a></li>
					<li><a href="#" data-toggle="modal" data-target="#about">About</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Reg">How To Register?</a></li>
					<li></li>
			</ul>
			 
			<ul class="nav navbar-nav navbar-right" id="navBR">
					<li><a href="#">Register?</a></li>
					<li><button type="button" class="btn btn-default" id="bt" onclick="window.location.assign('login.php')">Login</button></li>
					
            </ul>
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
</div> <!-- end of contaainer fluid -->

<div id="wrapperreg">
<center><h1 style="color:green;">Congratulations!</h1>
<br><br>
<h3>You have Successfully Filled you Registeration Form</h3> <hr>
<h3>To Complete Registeration. <br>Login In with Your ID<br><br><div style="color:red;">You will be Redirected to login Page in 5 seconds!<div></h3> </center>
<center>

</body>
</html>