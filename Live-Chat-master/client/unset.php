<?php 
		session_start();
		$conn=mysqli_connect('localhost','root','','live_chat');
		$name = $_SESSION['present_user'];
		$Cid=$_SESSION['present_id'];
		

		$sql="UPDATE user SET `Status` = 0 Where Name='$name'";
			$sql1="UPDATE messages SET `Status` = 0 Where Customer_ID='$Cid'";
		
			mysqli_query($conn,$sql);
 			mysqli_query($conn,$sql1);
 
 ?>