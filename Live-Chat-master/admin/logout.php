<?php 
		session_start();
		$Aid=$_SESSION['agent_id'];
		$conn=mysqli_connect('localhost','root','','live_chat');
		$sql="UPDATE user SET Status = 0 WHERE User_ID = '$Aid'";
		mysqli_query($conn,$sql);

		unset ($_SESSION['agent_user']);
			header('Location:index.php');
?>