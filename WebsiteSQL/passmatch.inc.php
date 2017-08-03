<?php

if(isset($_POST['pass2'])&&isset($_POST['pass1']))
{ 	$pass2=$_POST['pass2'];
	$pass=$_POST['pass1'];
	if (!empty($pass)&&!empty($pass2))
	{
			if($pass==$pass2)
			{
				echo 'Passwords Matched';
			}
			else {
				echo 'Passwords Don\'t Match ' ; 
			}
	}
}
?>