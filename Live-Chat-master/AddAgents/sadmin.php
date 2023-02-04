<?php
$mail = $_POST['mail'];
$pass = $_POST['pass'];

	if($mail =='admin' && $pass == '123')
		{echo '1';}
	else
		{echo '0';}
?>