<!doctype html>
<html>
<head> <link rel="shortcut icon" href="fav.png" type="image/png">
 <title> MyResume </title>
	 
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="website.css">
	<link rel="stylesheet" href="registeration.css">
	
		<?php
				
				$result='';
				$redloc='registerationsuccess.php';
				$fname='';$lname='';$age='';$dob='';$aaddress='';$paddress='';$aphone='';$pphone='';$email='';$gender='';
				$sch='';$gclg='';$pclg='';$sch10name='';$sch12name='';$board10='';$board12='';$per10='';$per12='';
				$collegename=''; $collegeboard=''; $collegeper=''; $postcollegeboard=''; $postcollegename=''; 
				$postcollegeper='';
				$usid='';
				
				if (isset($_POST['fname'])&& isset($_POST['lname'])&&isset($_POST['age'])&& isset($_POST['dob'])&&isset($_POST['paddress'])&& isset($_POST['aaddress'])&&isset($_POST['aphone'])&& isset($_POST['pphone'])&&isset($_POST['email'])&&isset($_POST['sch'])&& isset($_POST['gclg'])&&isset($_POST['pclg'])&& isset($_POST['10schname'])&& isset($_POST['10board'])&&isset($_POST['10per'])&& isset($_POST['12schname'])&&isset($_POST['12per'])&& isset($_POST['12board'])&&isset($_POST['usid'])&&isset($_POST['pass1'])&&isset($_POST['pass2']) )
				{
				
				$fname=htmlentities($_POST['fname']); $lname=htmlentities($_POST['lname']);
				$age=htmlentities($_POST['age']); $dob=htmlentities($_POST['dob']);
				$aaddress=htmlentities($_POST['aaddress']); $paddress=htmlentities($_POST['paddress']);
				$aphone=htmlentities($_POST['aphone']); $pphone=htmlentities($_POST['pphone']);
				$email=htmlentities($_POST['email']); $gender=htmlentities($_POST['gender']);
				$sch=htmlentities($_POST['sch']); $gclg=htmlentities($_POST['gclg']);
				$pclg=htmlentities($_POST['pclg']); $sch10name=htmlentities($_POST['10schname']);
				$sch12name=htmlentities($_POST['12schname']); $board10=htmlentities($_POST['10board']);
				$board12=htmlentities($_POST['12board']); $per10=htmlentities($_POST['10per']);
				$per12=htmlentities($_POST['12per']); $collegename=htmlentities($_POST['collegename']);
				$collegeboard=htmlentities($_POST['collegeboard']);$collegeper=htmlentities($_POST['collegeper']);
				$postcollegename=htmlentities($_POST['postcollegename']);
				$postcollegeboard=htmlentities($_POST['postcollegeboard']);
				$postcollegeper=htmlentities($_POST['postcollegeper']);

				$usid=htmlentities($_POST['usid']);
				$pass1=htmlentities($_POST['pass1']); $pass2=htmlentities($_POST['pass2']);
				$pass1_encrypt=md5($pass1);
				$usid_encrypt=md5($usid);
				
					if(!empty($fname)&&!empty($lname)&&!empty($age)&&!empty($dob)&&!empty($paddress)&&!empty($pphone)&&!empty($email)&&!empty($sch)&&!empty($gclg)&&!empty($pclg)&&!empty($sch10name)&&!empty($sch12name)&&!empty($board10)&&!empty($board12)&&!empty($per10)&&!empty($per12)&&!empty($usid)&&!empty($pass1)&&!empty($pass2))
						{  
							if($pass1==$pass2) {
							if (mysql_connect('localhost','root','')&& mysql_select_db('mydatabase1') )
							{  
								$query="SELECT `id` FROM `users` WHERE `name`='".$usid."'";
								$queryrun=mysql_query($query);
								$queryrows=mysql_num_rows($queryrun);
								if($queryrows>=1)
								{$result="Username ".$usid." Already Exists!";}
								else {
									$query="INSERT INTO `users`(`id`, `name`, `password`, `fname`, `lname`, `age`, `dob`, `paddress`, `aaddress`, `pphone`, `aphone`, `email`, `gender`, `sch`, `gclg`, `pclg`, `sch10name`, `board10`, `per10`, `sch12name`, `board12`, `per12`, `collegename`, `collegeboard`, `collegeper`, `postcollegename`, `postcollegeboard`, `postcollegeper`) VALUES ('' , '".$usid."' , '".$pass1_encrypt."' , '".$fname."' , '".$lname."' , '".$age."' , '".$dob."' , '".$paddress."' , '".$aaddress."' , '".$pphone."' , '".$aphone."' , '".$email."' , '".$gender."' , '".$sch."' , '".$gclg."' , '".$pclg."' , '".$sch10name."' , '".$board10."' , '".$per10."' , '".$sch12name."' , '".$board12."' , '".$per12."' , '".$collegename."' , '".$collegeboard."' , '".$collegeper."' , '".$postcollegename."' , '".$postcollegeboard."' , '".$postcollegeper."')";
									
									$query2="INSERT INTO `passwords`(`id`,`password`) VALUES ('','".$pass1."')";
										 if ($queryrun=mysql_query($query) && $queryrun2=mysql_query($query2))
											{
											 header('Location: '.$redloc);
											}
										 else { $result='Unable to register Right Now.  Try Again Later!';}
									} 
							}
							
							else {$result='Database Connection Error. Try Again Later!' ;}	
							
							}
							else { $result='Passwords Don\'t Match';}
					} 
						else
						{ $result= '*Fields are Necessary to fill ';}

					
				}
	?>
	<script type="text/javascript" >
function load() {
if (window.XMLHttpRequest){
	xmlhttp= new XMLHttpRequest();
} else {
	xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
}
xmlhttp.onreadystatechange = function (){
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
		document.getElementById('confirm').innerHTML=xmlhttp.responseText;
	}
}
post = 'usid='+document.getElementById('username').value;
xmlhttp.open('POST','include.inc.php',true);
xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xmlhttp.send(post); 
}

function pass() {
if (window.XMLHttpRequest){
	xmlhttp= new XMLHttpRequest();
} else {
	xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
}
xmlhttp.onreadystatechange = function (){
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
		document.getElementById('length').innerHTML=xmlhttp.responseText;
	}
}
post = 'pass1='+document.getElementById('password').value;
xmlhttp.open('POST','include.inc.php',true);
xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xmlhttp.send(post); 
}

function check (){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById('passmatch').innerHTML = xmlhttp.responseText;
		}
	}
post = 'pass2='+document.getElementById('password2').value +'&pass1='+document.getElementById('password').value;
xmlhttp.open('POST','passmatch.inc.php',true);
xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xmlhttp.send(post); 
	
}
</script>

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
					<li><a href="#">Register?</a></li>
					<li><button type="button" class="btn btn-default" id="bt" onclick="window.location.assign('checksession.php')">Login</button></li>
					
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
        <p>Click On the <strong><a href="#">Register</a></strong> link.</p>
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
<div id="wrapper">
<h1 style="font-weight:bold;font-size:40px;"><center>Registeration</center></h1> <hr>
<center>
<form action="registeration.php" method="POST" role="form">
<table>
	<div class="from group">
			<tr>
				<td colspan="2" style=" text-align:center; color:white; font-weight:bold; font-size:25px;"><?php echo $result; ?></td>
			</tr>
			
			<tr>
				
				<td>Name : </td>
				<td><input type="text" name="fname" maxlength="40" placeholder="First Name*" value="<?php echo $fname; ?>" class="form-control" ></td> 
				<td><input type="text" name="lname" maxlength="40" placeholder="Last Name*" value="<?php echo $lname; ?>" class="form-control"></td>
				 
			</tr> 
	</div>
	<div class="from group">
			<tr>
				<td>Age :</td>  
				<td><input type="text" name="age" maxlength="2" placeholder=" Age*" value="<?php echo $age; ?>" class="form-control"></td>
				
			</tr> 
	</div>
	
	
	<div class="from group">
			<tr>
				<td>DOB :</td>  
				<td><input type="text" name="dob" maxlength="20" placeholder="Date Of Birth*" value="<?php echo $dob; ?>" class="form-control"></td>
				
			</tr> 
	</div>
	
	<div class="from group">
			<tr>
				<th rowspan="2">Address :</th> 
				<td colspan="2"><input type="text" name="paddress" maxlength="50" placeholder="Permenant Address*" value="<?php echo $paddress; ?>"class="form-control"></td>
				
			</tr> 
			<tr>
				<td colspan="2"><input type="text" name="aaddress" maxlength="50" placeholder="Alternate Address" value="<?php echo $aaddress; ?>" class="form-control"></td>
			</tr>

	</div>
	
	<div class="from group">
			<tr>
				<th rowspan="2">Contact No :</td>
				<td><input type="text" name="pphone" maxlength="20"  placeholder="Phone Number*" value="<?php echo $pphone ?>" class="form-control">
				
			</tr>
			<tr>
				<td><input type="text" name="aphone" maxlength="20" placeholder="Alternate Number" value="<?php echo $aphone; ?>" class="form-control">
			</tr>
	</div>
	
	
	<div class="from group">
			<tr>
				<td>Email :</td> 
				<td colspan="2"><input type="email" maxlength="50"  name="email" placeholder="E-mail Address*" value="<?php echo $email; ?>" class="form-control"></td>
			</tr>
	</div>
	
			<tr>
					<td>Gender : </td>
					<td >
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"> Male
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"> Female 
					</td> 
			</tr>
			
	<div class="form-group">
		<tr> <td>School :</td>
			<td colspan="3">
					<select class="form-control" id="sel1" name="sch">
								<option value="Science">Science</option>
								<option value="Commerce">Commerce</option>
								<option value="Arts">Arts</option>
								
					</select>
			</td>
		</tr>
		<script type="text/javascript">
  document.getElementById('sel1').value = "<?php echo $_POST['sch'];?>";
				</script>
	</div> 
	
	<div class="form-group">
		<tr> <td>Graduation :</td>
			<td colspan="3">
					<select class="form-control" id="sel2" name="gclg">
								<option value="Nill">Nill</option>
								<option value="B.Tech">B.Tech</option>
								<option value="B.Com">B.Com</option>
								<option value="B.Arch">B.Arch</option>
								<option value="BCA">BCA</option>
								<option value="B.Ed">B.Ed</option>
								<option value="B.Com(Hons)">B.Com(Hons)</option>
								<option value="BSE">BSE</option>
								<option value="Others">Others</option>
					</select>
					<script type="text/javascript">
  document.getElementById('sel2').value = "<?php echo $_POST['gclg'];?>";
				</script>
			</td>
		</tr>
		</div>
		
	<div class="form-group">
		<tr> <td>Post Graduation :</td>
			<td colspan="3">
					<select class="form-control" id="sel3" name="pclg">
								<option value="Nill">Nill</option>
								<option value="M.Tech">M.Tech</option>
								<option value="M.Com">M.Com</option>
								<option value="MBA">MBA</option>
								<option value="Others">Others</option>
					</select>
					<script type="text/javascript">
  document.getElementById('sel3').value = "<?php echo $_POST['pclg'];?>";
				</script>
			</td>
		</tr>
	</div>

  
	<div class="from group">
			<tr>
					<th rowspan="4"> Education : </th>
					<td colspan="2"><input type="text" name="10schname" maxlength="50" placeholder="10th School Name*" value="<?php echo $sch10name; ?>"class="form-control"></td>
					<td><input type="text" name="10board" maxlength="30" placeholder="10th Board of Examination*" value="<?php echo $board10; ?>" class="form-control"></td>
					<td><input type="text" name="10per" maxlength="5" placeholder="10th Percentage*" value="<?php echo $per10; ?>" class="form-control"></td>
					
					
			</tr> 
			<tr>
					<td colspan="2"><input type="text" name="12schname" maxlength="50"  placeholder="12th School Name*" value="<?php echo $sch12name; ?>" class="form-control"></td>
					<td><input type="text" name="12board" maxlength="30" placeholder="12th Board of Examination*"value="<?php echo $board12; ?>"  class="form-control"></td>
					<td><input type="text" name="12per" maxlength="5" placeholder="12th Percenatage*" value="<?php echo $per12; ?>" class="form-control"></td>
			</tr>
			<tr>
					<td colspan="2"><input type="text" name="collegename" maxlength="50"  placeholder="College / University Name" 
					value="<?php echo $collegename; ?>" class="form-control"></td>
					<td><input type="text" name="collegeboard" maxlength="30" placeholder="Examination Board" 
					value="<?php echo $collegeboard; ?>" class="form-control"></td>
					<td><input type="text" name="collegeper" maxlength="5" placeholder="Graduation Percentage" 
					value="<?php echo $collegeper; ?>" class="form-control"></td>
			</tr>
			<tr>
					<td colspan="2"><input type="text"  name="postcollegename" maxlength="50"  placeholder="College / University Name" value="<?php echo $postcollegename; ?>" class="form-control"></td>
					<td><input type="text" name="postcollegeboard" maxlength="30" placeholder="Examination Board" value="<?php echo $postcollegeboard; ?>" class="form-control"></td>
					<td><input type="text" name="postcollegeper" maxlength="5" placeholder="Post Graduation Percentage" value="<?php echo $postcollegeper; ?>" class="form-control"></td>
			</tr>
	</div>
	

	<div class="from group">
			<tr>
					<th rowspan="5">Documents : </th>
					<td> 10th Marksheet</td>
					<td><input type="file" name="pic" accept="image/*"></td>
			</tr> 
			<tr>
					<td>12th Marksheet</td>
					<td><input type="file" name="pic" accept="image/*"></td>
			</tr>
			<tr>
					<td>Graduation Marksheet</td>
					<td><input type="file" name="pic" accept="image/*"></td>
			</tr>
			<tr>
					<td>Post Graduation Marksheet</td>
					<td><input type="file" name="pic" accept="image/*"></td>
			</tr>
			<tr>
					<td>Identity/Address Proof</td>
					<td><input type="file" name="pic" accept="image/*"></td>
			</tr>
			<tr>
					<td></td>
					<td><button type="button" class="btn btn-primary">Submit Documents</button></td>
			</tr>
	</div>
	
	<div class="from group">
			<tr>
					<td>UserID :</td>
					<td><input type="text" id="username" onkeyup="load();" name="usid" class="form-control" maxlength="30" placeholder="Enter/Pick Your Username*"value="<?php echo $usid; ?>"></td>
					<td id="confirm"></td>
			</tr> 
			<tr>
					<td>New Password :</td>
					<td><input type="password" id="password" onkeyup="pass();" name="pass1" class="form-control" placeholder="Enter Password*"></td>
					<td id="length"></td>
					
			</tr> 
			<tr>
					<td>Confirm Password :</td>
					
					<td><input type="password" id="password2" onkeyup="check();" name="pass2" class="form-control" placeholder="Re-type Password*"></td>
					<td id="passmatch"></td>
			</tr> 
	</div>
	
	<div class="from group">
			<tr>
					<td></td>
					<td></td>
					
			</tr>
			<tr>
					
					<td colspan="5" style="text-align:center;">
					<button type="submit" class="btn btn-success btn-lg btn-block">Register</button> </td>
			</tr> 
	</div>
	
	
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