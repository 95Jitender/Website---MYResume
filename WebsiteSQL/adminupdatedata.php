<!doctype html>
<html>
<head> <link rel="shortcut icon" href="fav.png" type="image/png" > <title> MyResume </title>
	 
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
		$id=$_GET['id'];
			$result='';
		mysql_connect('localhost','root','');
		mysql_select_db('mydatabase1');
		$query="SELECT  `id` ,`name` ,`fname`, `lname`, `age`, `dob`, `paddress`, `aaddress`, `pphone`, `aphone`, `email`, `gender`, `sch`, `gclg`, `pclg`, `sch10name`, `board10`, `per10`, `sch12name`, `board12`, `per12`, `collegename`, `collegeboard`, `collegeper`, `postcollegename`, `postcollegeboard`, `postcollegeper` FROM `users` WHERE `id`='".$id."'";
		if ($queryrun=mysql_query($query))
	{	$id=mysql_result($queryrun,0,'id');
		$usid=mysql_result($queryrun,0,'name');
		$fname=mysql_result($queryrun,0,'fname');$lname=mysql_result($queryrun,0,'lname');
		$age=mysql_result($queryrun,0,'age');
		$dob=mysql_result($queryrun,0,'dob');$aaddress=mysql_result($queryrun,0,'aaddress');
		$paddress=mysql_result($queryrun,0,'paddress');$aphone=mysql_result($queryrun,0,'aphone');
		$pphone=mysql_result($queryrun,0,'pphone');
		$email=mysql_result($queryrun,0,'email');
		$sch=mysql_result($queryrun,0,'sch');$gclg=mysql_result($queryrun,0,'gclg');$pclg=mysql_result($queryrun,0,'pclg');$sch10name=mysql_result($queryrun,0,'sch10name');$sch12name=mysql_result($queryrun,0,'sch12name');
		$board10=mysql_result($queryrun,0,'board10');$board12=mysql_result($queryrun,0,'board12');
		$per10=mysql_result($queryrun,0,'per10');$per12=mysql_result($queryrun,0,'per12');
		$collegename=mysql_result($queryrun,0,'collegename'); $collegeboard=mysql_result($queryrun,0,'collegeboard'); $collegeper=mysql_result($queryrun,0,'collegeper'); $postcollegeboard=mysql_result($queryrun,0,'postcollegeboard'); $postcollegename=mysql_result($queryrun,0,'postcollegename');$postcollegeper=mysql_result($queryrun,0,'postcollegeper');
    }
  
			
	 if (isset($_POST['fname'])&& isset($_POST['lname'])&&isset($_POST['age'])&& isset($_POST['dob'])&&isset($_POST['paddress'])&& isset($_POST['aaddress'])&&isset($_POST['aphone'])&& isset($_POST['pphone'])&&isset($_POST['email'])&&isset($_POST['sch'])&& isset($_POST['gclg'])&&isset($_POST['pclg'])&& isset($_POST['10schname'])&& isset($_POST['10board'])&&isset($_POST['10per'])&& isset($_POST['12schname'])&&isset($_POST['12per'])&& isset($_POST['12board']) &&isset($_GET['id']))
				{	$id=$_GET['id'];
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
			
			$query=" UPDATE `users` SET `fname`='".$fname."', `lname`='".$lname."',`paddress`='".$paddress."',`aaddress`='".$aaddress."',`pphone`='".$pphone."',`aphone`='".$aphone."',`email`='".$email."',`gclg`='".$gclg."',`pclg`='".$pclg."',`collegename`='".$collegename."',`collegeboard`='".$collegeboard."',`collegeper`='".$collegeper."',`postcollegename`='".$postcollegename."',`postcollegeboard`='".$postcollegeboard."',`postcollegeper`='".$postcollegeper."' ,`sch10name`='".$sch10name."',`board10`='".$board10."',`per10`='".$per10."',`sch12name`='".$sch12name."',`board12`='".$board12."',`per12`='".$per12."' WHERE `id`='".$id."'";
			
			if($queryrun=mysql_query($query)) {
			$result= 'Data Updated!'; }
			else { $result = 'Unable to Update Data.';}
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
					<li><button type="button" class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
					
            </ul>
			<div>
	</div>
</nav>
</div> <!-- end of contaainer fluid -->
<div id="wrapper">
<h1 style="font-weight:bold;font-size:40px;"><center>Update Resume</center></h1> <hr>
<center>
<form action="adminupdatedata.php?id=<?php echo $id;?>" method="POST" role="form">
<table>
	<div class="from group">
			<tr>
				<td colspan="2" style=" text-align:center; color:white; font-weight:bold; font-size:30px;"><?php echo $result; ?></td>
			</tr>
			<tr>
				<td>ID :</td>
				<td><input type="text" name="id" readonly value="<?php echo $id; ?>" class="form-control" ></td>
			</tr>
			<tr>
				
				<td>Name : </td>
				<td><input type="text" name="fname" placeholder="First Name*" value="<?php echo $fname; ?>" class="form-control" ></td> 
				<td><input type="text" name="lname" placeholder="Last Name*" value="<?php echo $lname; ?>" class="form-control"></td>
				 
			</tr> 
	</div>
	<div class="from group">
			<tr>
				<td>Age :</td>  
				<td><input type="text" name="age" placeholder=" Age*" value="<?php echo $age; ?>" class="form-control"></td>
				
			</tr> 
	</div>
	
	
	<div class="from group">
			<tr>
				<td>DOB :</td>  
				<td><input type="text" name="dob" placeholder="Date Of Birth*" value="<?php echo $dob; ?>" class="form-control"></td>
				
			</tr> 
	</div>
	
	<div class="from group">
			<tr>
				<th rowspan="2">Address :</th> 
				<td colspan="2"><input type="text" name="paddress" placeholder="Permenant Address*" value="<?php echo $paddress; ?>"class="form-control"></td>
				
			</tr> 
			<tr>
				<td colspan="2"><input type="text" name="aaddress" placeholder="Alternate Address*" value="<?php echo $aaddress; ?>" class="form-control"></td>
			</tr>

	</div>
	
	<div class="from group">
			<tr>
				<th rowspan="2">Contact No :</td>
				<td><input type="text" name="pphone" placeholder="Phone Number*" value="<?php echo $pphone ?>" class="form-control">
				
			</tr>
			<tr>
				<td><input type="text" name="aphone" placeholder="Alternate Number*" value="<?php echo $aphone; ?>" class="form-control">
			</tr>
	</div>
	
	
	<div class="from group">
			<tr>
				<td>Email :</td> 
				<td colspan="2"><input type="email" name="email" placeholder="E-mail Address*" value="<?php echo $email; ?>" class="form-control"></td>
			</tr>
	</div>
	
	<div class="form-group">
		<tr> <td>School :</td>
			<td colspan="3">
					<select class="form-control" id="sel1" name="sch">
								<option value="Science">Science</option>
								<option value="Commerce">Commerce</option>
								<option value="Arts">Arts</option>
								
					</select>
					<script type="text/javascript">
  document.getElementById('sel1').value = "<?php echo $sch;?>";
				</script>
								
					</select>
			</td>
		</tr>
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
  document.getElementById('sel2').value = "<?php echo $gclg;?>";
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
  document.getElementById('sel3').value = "<?php echo $pclg;?>";
				</script>
			</td>
		</tr>
	</div>

  
	<div class="from group">
			<tr>
					<th rowspan="4"> Education : </th>
					<td colspan="2"><input type="text"  name="10schname" placeholder="10th School Name*" value="<?php echo $sch10name; ?>"class="form-control"></td>
					<td><input type="text"  name="10board" placeholder="10th Board of Examination*" value="<?php echo $board10; ?>" class="form-control"></td>
					<td><input type="text"  name="10per" placeholder="10th Percentage*" value="<?php echo $per10; ?>" class="form-control"></td>
					
					
			</tr> 
			<tr>
					<td colspan="2"><input type="text"  name="12schname" placeholder="12th School Name*" value="<?php echo $sch12name; ?>" class="form-control"></td>
					<td><input type="text"  name="12board" placeholder="12th Board of Examination*"value="<?php echo $board12; ?>"  class="form-control"></td>
					<td><input type="text"  name="12per" placeholder="12th Percenatage*" value="<?php echo $per12; ?>" class="form-control"></td>
			</tr>
			<tr>
					<td colspan="2"><input type="text" name="collegename" placeholder="College / University Name" 
					value="<?php echo $collegename; ?>" class="form-control"></td>
					<td><input type="text" name="collegeboard" placeholder="Examination Board" 
					value="<?php echo $collegeboard; ?>" class="form-control"></td>
					<td><input type="text" name="collegeper" placeholder="Graduation Percentage" 
					value="<?php echo $collegeper; ?>" class="form-control"></td>
			</tr>
			<tr>
					<td colspan="2"><input type="text" name="postcollegename" placeholder="College / University Name" value="<?php echo $postcollegename; ?>" class="form-control"></td>
					<td><input type="text" name="postcollegeboard" placeholder="Examination Board" value="<?php echo $postcollegeboard; ?>" class="form-control"></td>
					<td><input type="text" name="postcollegeper" placeholder="Post Graduation Percentage" value="<?php echo $postcollegeper; ?>" class="form-control"></td>
			</tr>
	</div>
		
	<div class="from group">
			<tr>
					<td></td>
					<td></td>
					
			</tr>
			<tr>
					
					<td colspan="5" style="text-align:center;">
					<button type="submit" class="btn btn-success btn-lg btn-block">Update</button> </td>
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