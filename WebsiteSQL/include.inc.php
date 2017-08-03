<?php
if(isset($_POST['usid']))
{ $name=$_POST['usid'];
	if(!empty($name))
	{
		if(mysql_connect('localhost','root','')&&mysql_select_db('mydatabase1'))
		{
			$query="SELECT `name` FROM `users` WHERE `name` LIKE '".$name."%'";
			if ($query_run=mysql_query($query))
			{
				$results=mysql_fetch_assoc($query_run);
			    $ans=$results['name'];
				if(strcasecmp($ans,$name)==0)
					{
						echo 'Username '.$name.' is Not Available';
					}
					else {
						 echo 'Username '.$name.' is Available';
					}
				
				
				
			}
		}
		else
		{
			echo 'Could not retirve results now';
		}
	}
}

if(isset($_POST['pass1']))
{ $name=strlen($_POST['pass1']);
	$pass=$_POST['pass1'];
	if(!empty($pass))
	{
	if ($name>0&&$name<=6)
	{
		echo 'Password Strength : Low ';
	}
	else if($name>6 && $name<12) {
		echo 'Password Strength : Medium ';
	}
	else{
		echo 'Password Strength : High ';
	} 
	}
}
?>