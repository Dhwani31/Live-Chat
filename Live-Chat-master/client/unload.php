<?php 
		session_start();
		$conn=mysqli_connect('localhost','root','','live_chat');
		$name = $_SESSION['present_user'];
		$Cid=$_SESSION['present_id'];
		$sql="UPDATE user SET `Status` = 0 Where Name='$name'";
		mysqli_query($conn,$sql);
 			
 ?>