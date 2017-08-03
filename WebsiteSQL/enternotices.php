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
		$result='';
		mysql_connect('localhost','root','');
		mysql_select_db('mydatabase1');
     	 if (isset($_POST['notice'])&& isset($_POST['title'])&&isset($_POST['frm']))
				{
				$time=time();
				$date=date('d M Y',$time);					
				$title=htmlentities($_POST['title']); $frm=htmlentities($_POST['frm']);
				$notice=htmlentities($_POST['notice']);
			
			$query="INSERT INTO `notices`(`id`,`date` ,`title`, `frm`, `message`) VALUES ('' ,'".$date."', '".$title."' , '".$frm."' , '".$notice."')";
			if($queryrun=mysql_query($query)) {
			$result= 'Notice Posted'; }
			else { $result = 'Unable to Post Data.';}
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
					<li><button type=button class="btn btn-danger" onClick="window.location.assign('stopsession.php')" id="bt">Logout</button></li>
					
            </ul>
			<div>
	</div>
</nav>
</div> <!-- end of contaainer fluid -->
<div id="wrapper">
<h1 style="font-weight:bold;font-size:40px;"><center>Enter Notice</center></h1> <hr>
<center>
<form action="enternotices.php" method="POST" role="form">
<table>
	<div class="from group">
			<tr>
				<td colspan="2" style=" text-align:center; color:white; font-weight:bold; font-size:30px;"><?php if(isset($result)){echo $result;} ?></td>
			</tr>
			<tr>
				<td> <input type="text"  class="form-control" value="<?php if(isset($title)){echo $title;} ?>" placeholder="Enter Title" style="width:600px;" name="title"></td>
			</tr>
			
	</div>
	<div class="from group">
			<tr>
				<td> <input type="text"  class="form-control"  placeholder="From"  value="<?php if(isset($frm)){ echo $frm;} ?>" style="width:600px;" name="frm"></td>
			</tr>
			
	</div>
	<div class="from group">
			<tr>
				<td><textarea style="color:black;" name="notice" placeholder="Enter Notice Details" rows="16" cols="80"><?php if(isset($notice)) {echo $notice;} ?></textarea></td>
			</tr> 
	</div>

	<div class="from group">
			<tr>
					<td></td>
					<td></td>
					
			</tr>
			<tr>
					
					<td colspan="5" style="text-align:center;">
					<button type="submit" class="btn btn-success btn-lg btn-block">Submit Notice</button> </td>
			</tr> 
	</div>
	
	
</table>
</center>

</form>
</div> <!--end of wrapper-->
</body>
</html>